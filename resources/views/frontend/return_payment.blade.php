<html>
    <head>
        <link href="{{ asset('admin_files/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Material Design Lite CSS -->
       
    </head>
    <body>
        <div class="container" style="margin-top: 100px">
            @if($status)
            <div class="alert alert-success">
                 <h5>{{ $data['message'] }}</h5>
            </div>
            @else
            <div class="alert alert-danger">
                 <h5>{{ $data['message'] }}</h5>
            </div>
            @endif

            <button id="send_post" class="btn btn-danger">Send post message from web</button>
            <div>Post message log</div>
            <textarea style="height: 50%; width: 100%;" readonly></textarea>


        </div>
        <script>
            var log = document.querySelector("textarea");

          //  document.getElementById("send_post").onclick = function () {
                console.log("Send post message");
                var eventData = @json($data);
                // logMessage("messag");
                logMessage(eventData);


            if (window.ReactNativeWebView !== undefined && window.ReactNativeWebView.postMessage !== undefined) {
                window.ReactNativeWebView.postMessage(JSON.stringify(eventData));
            }
            if (window.postMessage !== undefined) {
                window.postMessage(JSON.stringify(eventData));
            }
               
                // window.postMessage("Post message from web", "*");
           // };

            document.addEventListener("message", function (event) {
                console.log("Received post message", event);

                logMessage(event.data);
            }, false);

            function logMessage(data) {
                log.append(JSON.stringify(data));
            }

        </script>

    </body>
</html>