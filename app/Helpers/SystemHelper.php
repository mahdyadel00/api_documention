<?php


if (!function_exists('display')) {
    function display($text = null, $language = "")
    {
        $orig_text = $text;
        // dd(Session::get('locale'));
        if (!$language) {
            $locale = (Session::get('locale') != "") ?: 'ar';
            if (isset($locale)) {
                App::setLocale($locale);
            }
            $language = App::getLocale();
        }
        $text = trim($text);
        $text = str_replace(' ', '_', $text);
        // $text = str_limit($text, 150);

        if (!empty($text)) {
            $cacheId = str_replace(' ', '_', $text) . '.' . $language . '.language';
            // $cacheExpiration = (int) config('system_settings.cache_expiration', 1440); // Cache for 1 day (60 * 24)
            // return Cache::remember($cacheId, $cacheExpiration, function () use ($text, $language) {
            // dd($text);
            $row = DB::table('language')->where('phrase', '=', $text)->first();
            if ($row && optional($row)->$language) {
                return $row->$language;
            } else {
                if (!$row) {
                    $text2 = $text;
                    $text2 = str_replace('_', ' ', $text2);
                    // var_dump($text2);
                    $text2 = ucfirst($text2);
                    $text3 = ucfirst($text2);
                    DB::insert('insert into language (phrase, en, ar,tr) values (?, ?, ?, ?)', [$text, $text2, $text2, $text3]);

                    $row = DB::table('language')->where('phrase', '=', $text)->first();

                    return $row->$language;
                }
            }
            // });
        } else {
            return $orig_text;
        }
    }
}


function test_tables()
{
    \DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
    $tables = \DB::select('SHOW TABLES');
    foreach ($tables as $table) {
        $table = implode(json_decode(json_encode($table), true));
        \Schema::drop($table);
        echo 'tested `' . $table . '`. ';
    }
    \DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
}

if (!function_exists('assetWeb')) {
    /**
     * @param string $path
     * @param $secure
     * @return string
     */
    function assetWeb(string $path, $secure = null): string
    {
        return asset('/web/' . $path, $secure);
    }
}