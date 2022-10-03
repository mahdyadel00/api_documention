<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ejarly</title>
    <!-- Bootstrap Core CSS -->
    <link href="coming/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Coustard' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
    <link href="coming/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="coming/css/style.css" rel="stylesheet" />
    <!--[if lt IE 9]>
  <script src="coming/js/ie8-responsive-file-warning.js"></script>
 <![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="coming/images/fav-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="coming/images/fav-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="coming/images/fav-72.png">
    <link rel="apple-touch-icon-precomposed" href="coming/images/fav-57.png">
    <link rel="shortcut icon" href="coming/images/fav.png">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

</head>

<body>
    <!-- Preloader Starts -->
    <div class="loader">
    </div>
    <!-- Preloader Ends -->
    <!-- Header Section Starts -->
    <header id="header">
        <style>
            .al {
                width: 50%;
                text-align: center;
                position: fixed;
                left: 25%;
                top: 20px;
                z-index: 2;
            }

        </style>
        @if (Session::has('error'))
            <div class="al">
                @foreach (Session::get('error') as $err)
                    <div class="alert round alert-danger alert-icon-right mb-2" role="alert">
                        <span class="alert-icon">
                            <i class="ft-info"></i>
                        </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>{{ $err }}</strong>
                    </div>
                @endforeach
            </div>
        @endif
        @if (Session::has('success'))
            <div class="alert round alert-success alert-icon-right mb-2 al" role="alert">
                <span class="alert-icon">
                    <i class="ft-info"></i>
                </span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
        <img width="100%" src="coming/images/1199967846278282.XQOu3L51Gv9WYeNf9QFP_height640.jpg" alt="">

    </header>
    <!-- Header Section Ends -->

    </section>

    <!-- Services Section Starts -->
    <section id="services">
        <div class="services-overlay">
            <div class="container">
                <!-- Main Heading Starts -->
                <div class="main-head">

                    <h2 data-scroll-reveal="enter top and move 50px over 1.2s">عن إيجارلي</h2>
                    <h5 data-scroll-reveal="enter bottom and move 50px over 1.4s" style=" direction: rtl;   line-height: 35px;">
                        إيجارلي هي منصة تأجير تتيح لإفراد المجتمع مشاركة اشياءهم لبعضهم البعض،
                        ونمكن أصحاب الممتلكات من الاستفادة من اشياءهم المركونة والغير مستغلة من كسب المال منها من خلال تأجيرها لأفراد اخرون ،ونقوم بربطهم بالأفراد الذين يحتاجون الى اشياء للاستخدام قصير الاجل او للاستخدام الفردي لاستئجارها وتوفير المال، وتقوم المنصة على ربط و تسهيل التواصل لعملية التأجير بين الطرفين في بيئة امنة وموثوقة                       
                        .
                        <br><br>
                        يهدف فريقنا لخلق بيئة تشاركية امنة بين المجتمع  لتعزيز جودة حياة الفرد والأسرة ، توفير و دخل إضافي ،الحفاظ على البيئة
                    </h5>
                    <br />
                </div>
                <!-- Main Heading Ends -->
                <!-- Services List Starts -->
                <div id="services-blocks" class="row">
                    <div data-scroll-reveal="enter bottom and move 50px over 1.6s"
                        class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sblock">
                        <span class="fa fa-star-o"></span>
                        <h4>
                            آمن وجدير بالثقة</h4>
                        <p>
                            يتم فحص جميع المستخدمين من خلال عملية صارمة يتم  التحقق من هوية جميع المستخدمين لجعل الإقراض والاقتراض آمنين لكلا الطرفين 
                        </p>
                    </div>
                    <div data-scroll-reveal="enter top and move 50px over 1.7s"
                        class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sblock">
                        <span class="fa fa-smile-o"></span>
                        <h4>
                            الفائدة</h4>
                        <p>
                            أكسب المال من العناصر التي تمتلكها بالفعل، ووفرالمال من خلال عدم شراء الأشياء التي نادراً تستخدمها
                        </p>
                    </div>
                    <div data-scroll-reveal="enter bottom and move 50px over 1.8s"
                        class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sblock">
                        <span class="fa fa-eye"></span>
                        <h4>
                            الاستخدام</h4>
                        <p>
                            يمكنك الان البحث عن المئات من المنتجات في وقت واحد وبدون اي جهد وتكلفة واسعار مختلفة
                        </p>
                    </div>
                </div>
                <!-- Services List Ends -->
            </div>
        </div>
    </section>
    <!-- Services Section Ends -->
    <!-- Contact Us Section Starts -->
    <section id="contact" style="color:#000; font-weight:500" hidden>
        <div class="contact-overlay">

            <div class="container">
                <!-- Main Heading Starts -->
                <div class="main-head">
                    <h2 data-scroll-reveal="enter top and move 50px over 1.2s" class="MT40">
                        خليك شريك معانا واحصل على عضوية مؤسس
                    </h2>
                </div>
                <!-- Main Heading Ends -->
                <!-- Form & Address Blocks Starts -->
                <div class="row">
                    <!-- Contact Form Starts -->
                    <style>
                        input {
                            text-align: right;
                        }

                        .discuss {
                            text-align: justify;
                            direction: rtl;
                        }

                    </style>
                    <div data-scroll-reveal="enter left and move 50px over 1.6s" id="contact-area"
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <form id="contact-form" class="contact-form" name="contact-form" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" required
                                    placeholder="اسم المستخدم">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" required
                                    placeholder="البريد الإلكتروني">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" required placeholder="رقم الجوال">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" required
                                    placeholder="كلمة المرور">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control" required
                                    placeholder="إعادة كلمة المرور">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn" style="background: #fccd3d; color:#000">سجل
                                    الان</button>
                            </div>
                        </form>

                    </div>
                    <!-- Contact Form Ends -->
                    <!-- Contact Address Starts -->
                    <div data-scroll-reveal="enter right and move 50px over 1.8s"
                        class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <p class="discuss">
                            استغل الفرصة وكن من مؤسسين إيجارلي
                            لتحصل على مزايا عضوية المؤسس
                            سجل الان
                        </p>
                    </div>
                    <!-- Contact Address Ends -->
                </div>
                <!-- Form & Address Blocks Ends -->
            </div>
        </div>
    </section>
    <!-- Contact Us Section Ends -->
    <!-- Footer Starts -->
    <footer id="footer" style="background: rgba(255, 255, 255, 0.9); color:#000">
        <div class="container">
            <!-- Copyright Starts -->
            <div data-scroll-reveal="enter bottom and move 50px over 1.2s">
                <a href="https://www.facebook.com/ejarly" style="color: #000" target="_blanck">
                    <span>
                        <i class="fa fa-facebook-square  fa-3x"></i>
                    </span>
                </a>
                <a href="https://twitter.com/ejarlyapp" style="color: #000" target="_blanck">
                    <span>
                        <i class="fa fa-twitter-square fa-3x"></i>
                    </span>
                </a>     
                 <a href="https://www.instagram.com/ejarly/" style="color: #000" target="_blanck">
                    <span>
                        <i class="fa fa-instagram fa-3x"></i>
                    </span>
                </a>

                <p data-scroll-reveal="enter over 3.2s">
                    See Soon! Coming Soon/Under Construction Template. &copy ejarly.net
                </p>

            </div>
            <!-- Copyright Ends -->
        </div>
    </footer>
    <!-- Footer Ends -->
    <!-- Bootstrap core JavaScript -->
    <script src="coming/js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="coming/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="coming/js/jquery.backstretch.min.js" type="text/javascript"></script>
    <script src="coming/js/scrollReveal.js" type="text/javascript"></script>
    <script src="coming/js/jquery.downCount.js" type="text/javascript"></script>
    <script src="coming/js/custom.js" type="text/javascript"></script>


</body>

</html>
