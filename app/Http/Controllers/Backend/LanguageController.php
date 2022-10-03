<?php



namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;
use App\Models\Language;
use App\LanguageFile;
use Session;
use Storage;

class LanguageController extends BackendController

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
        $title = display('language');
        $languages = Language::all();
        // dd('test');

        $this->data['languages'] = $languages;
        $this->data['title'] = $title;
        return view('admin.language.language', $this->data );
    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        $title = display('edit_language');
        $language =  Language::find($id);


        $this->data['language'] = $language;
        $this->data['title'] = $title;
        return view('admin.language.edit-language', $this->data );

        // return view('admin.language.edit-language', ['language' => $language, 'title' => $title]);
    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        $this->validate($request, [
            'phrase' => 'required',
            'translation_english' => 'required',
            'translation_arabic' => 'required',
        ]);


        $language = Language::find($id);
        $language->en = $request->translation_english;
        $language->ar = $request->translation_arabic;
        $language->tr = $request->translation_turkish;
        $language->save();


        Session::flash('success', 'Translation updated successfully');

        return redirect()->route("index.language");
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        //

    }





    public function search(Request $request)

    {





        //$this->validate($request,['phrase'=>'required']);



        $s_text = $request->phrase;

        if (!$s_text) {  // empy text finds all not translated in files

            $files = LanguageFile::whereNull('ar')->get();

            $languages = array();
        } else {



            $files = LanguageFile::where('phase', 'like', '%' . $request->phrase . '%')->orwhere('ar', 'like', '%' . $request->phrase . '%')->orwhere('en', 'like', '%' . $request->phrase . '%')->orwhere('tr', 'like', '%' . $request->phrase . '%');



            if (strstr($s_text, ".")) {  // if user try to search with full phrase path including dots, then take last part only, as it's the phrase

                $s_text = preg_replace("/.*\./", "", $s_text);

                if ($s_text) {

                    $files = $files->orwhere('phase', '=', $s_text);
                }
            }



            $files = $files->get();



            $languages = Language::where('phrase', 'like', '%' . $request->phrase . '%')->orwhere('ar', 'like', '%' . $request->phrase . '%')->orwhere('en', 'like', '%' . $request->phrase . '%')->orwhere('tr', 'like', '%' . $request->phrase . '%')->get();
        }



        // $languages->appends($request->all());

        return view('admin.language.search', ['languages' => $languages, 'files' => $files]);
    }





    private function makeNonNestedRecursive(array &$out, $key, array $in)

    {

        foreach ($in as $k => $v) {

            if (is_array($v)) {

                $this->makeNonNestedRecursive($out, $key . $k . '---', $v);
            } else {

                $out[$key . $k] = $v;
            }
        }
    }



    private function makeNonNested(array $in)

    {

        $out = array();

        $this->makeNonNestedRecursive($out, '', $in);

        return $out;
    }





    private function changeFile($data, $file, $lang)

    {

        $disc = 'languages';

        $langFile = "$lang/$file.php";

        Storage::disk($disc)->put($langFile, "<?php");

        $all_lines = '';

        foreach ($data as $key => $value) {

            $keys = '$strings["' . str_replace('---', '"]["', $key) . '"]';

            $values = '"' . $this->fix_q($value) . '";';

            $line = $keys . ' = ' . $values;



            $all_lines .= $line . "\n";

            ////Storage::disk($disc)->append($langFile, $line);

        }



        Storage::disk($disc)->append($langFile, $all_lines . 'return $strings;');
    }



    function fix_q($str)
    {

        return str_replace('"', '\\"', $str);
    }
}
