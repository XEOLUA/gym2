<!-- Price box minimal--><!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('assets/images/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('assets/images/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('assets/images/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{url('assets/images/favicons/site.webmanifest')}}">

    <!-- plugin scripts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,500i,600,700,800%7CSatisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/plugins/fontawesome-free-5.11.2-web/css/all.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/plugins/kipso-icons/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/vegas.min.css')}}">

    <!-- template styles -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/responsive.css')}}">

    <title>{{ config('app.name', 'XEOL') }} | @yield('title','XEOL')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-166193936-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-166193936-1');
    </script>

    <link rel="stylesheet" type="text/css" href={{url("//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900")}}>
{{--    <link rel="icon" href="images/favicon.ico" type="image/x-icon">--}}
    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
    <link rel="icon" href="{{url('images/favicon.ico?v=2')}}" type={{url("image/x-icon")}}>

{{--    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">--}}
{{--    <link rel="stylesheet" href={{url("fonts/fonts.css")}}>--}}
{{--    <link rel="stylesheet" href={{url("css/style.css")}}>--}}
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
</head>
<body>

<main role="main">
    @yield('content')
</main>

<div class="snackbars" id="form-output-global"></div>
<script src="{{url('js/core.min.js')}}"></script>
<script src="{{url('js/script.js')}}"></script>
<script defer src="https://www.google.com/recaptcha/api.js" async></script>
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{url('assets/js/waypoints.min.js')}}"></script>
<script src="{{url('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{url('assets/js/TweenMax.min.js')}}"></script>
<script src="{{url('assets/js/wow.js')}}"></script>
<script src="{{url('assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{url('assets/js/countdown.min.js')}}"></script>
<script src="{{url('assets/js/vegas.min.js')}}"></script>

<!-- template scripts -->
<script src="{{url('assets/js/theme.js')}}"></script>

<script src="{{asset('tiac/src/jquery.tagsinput-revisited.js')}}"></script>
<link rel="stylesheet" href="{{asset('tiac/src/jquery.tagsinput-revisited.css')}}">

<script type="text/javascript">
    $(document).ready(function() {

        $('#filter').tagsInput();
        $('#filter_sex').tagsInput();
        $('#filter_year').tagsInput();

        let container = document.getElementById('News-list');
        let btn = document.getElementById('btnShowMoreNewses');
        let cnt = 1;

        function fetchdata(page){
            $.ajax({
                url:location+"/fetch_data?page="+page,
                success:function(data){

                    if(data!='empty'){
                        $('#newses-list').append(data);
                        // console.log(data);
                    }
                    else {
                        btn.style.display='none';
                         console.log(data);
                    }
                }
            });
        }

        if(btn!=null)
            btn.onclick = function(e){
                fetchdata(++cnt);
                console.log(cnt);
            }

    });
        let btnRebuild=document.getElementById('rebuild');
        let countPupilsOnPage=15;
        let timerStart = Date.now();
        let classeslist = document.getElementById('classeslist');
        let sex = document.getElementById('sex');
        let snp = document.getElementById('snp');
        let dt = document.getElementById('dt');
        let timer = 0;

        let column_id = document.getElementById('column_id');
        let column_alpha = document.getElementById('column_alpha');
        let column_snp = document.getElementById('column_snp');
        let column_class = document.getElementById('column_class');
        let column_sex = document.getElementById('column_sex');
        let column_dt = document.getElementById('column_dt');
        let column_teacher = document.getElementById('column_teacher');
        let column_contact = document.getElementById('column_contact');
        let column_address = document.getElementById('column_address');
        let column_social_group = document.getElementById('column_social_group');
        let field_sort = document.getElementById('field_sort');

        let ar_col = {};
        ar_col['id']=true;
        ar_col['alpha']=true;
        ar_col['snp']=true;
        ar_col['class']=true;
        ar_col['sex']=false;
        ar_col['dt']=false;
        ar_col['contact']=false;
        ar_col['teacher']=false;
        ar_col['address']=false;
        ar_col['social_group']=false;

        classeslist.oninput = function (e){
            $('#filter').addTag(this.value);
        }

        sex.oninput = function (e){
            $('#filter_sex').addTag(this.value);
        }

        dt.oninput = function (e){
            $('#filter_year').addTag(this.value);
        }

        snp.oninput = function (e){
            clearTimeout(timer);
            timer = setTimeout(function() {
                fetch_data(1);
            }, 1000);
        }

        btnRebuild.onclick = function(e){
            timerStart = Date.now();
            countPupilsOnPage=1*document.getElementById('countPupilsOnPage').innerText;
            fetch_data(1);
        }

        $(document).on('click','.pagination a', function(event){
            timerStart = Date.now();
            event.preventDefault();
            let page=$(this).attr('href').split('page=')[1];
            fetch_data(page);
        });

        // show/hidden columns

        column_id.onclick = function (e){
            if(this.checked)
                $(".col_id").removeClass("col_off");
            else
                $(".col_id").addClass("col_off");
            ar_col['id']=this.checked;
        }

        column_alpha.onclick = function (e){
            if(this.checked)
                $(".col_alpha").removeClass("col_off");
            else
                $(".col_alpha").addClass("col_off");
            ar_col['alpha']=this.checked;
        }

        column_snp.onclick = function (e){
            if(this.checked)
                $(".col_snp").removeClass("col_off");
            else
                $(".col_snp").addClass("col_off");
            ar_col['snp']=this.checked;
        }

        column_class.onclick = function (e){
            if(this.checked)
                $(".col_class").removeClass("col_off");
            else
                $(".col_class").addClass("col_off");
            ar_col['class']=this.checked;
        }

        column_sex.onclick = function (e){
            if(this.checked)
                $(".col_sex").removeClass("col_off");
             else
                $(".col_sex").addClass("col_off");
            ar_col['sex']=this.checked;
        }

        column_dt.onclick = function (e){
            if(this.checked)
                $(".col_dt").removeClass("col_off");
            else
                $(".col_dt").addClass("col_off");
            ar_col['dt']=this.checked;
        }

        column_teacher.onclick = function (e){
            if(this.checked)
                $(".col_teacher").removeClass("col_off");
            else
                $(".col_teacher").addClass("col_off");
            ar_col['teacher']=this.checked;
        }

        column_contact.onclick = function (e){
            if(this.checked)
                $(".col_contact").removeClass("col_off");
            else
                $(".col_contact").addClass("col_off");
            ar_col['contact']=this.checked;
        }

        column_address.onclick = function (e){
            if(this.checked)
                $(".col_address").removeClass("col_off");
            else
                $(".col_address").addClass("col_off");
            ar_col['address']=this.checked;
        }

        column_social_group.onclick = function (e){
            if(this.checked)
                $(".col_social_group").removeClass("col_off");
            else
                $(".col_social_group").addClass("col_off");
            ar_col['social_group']=this.checked;
        }

        function fetch_data(page){
              // console.log(document.getElementById('field_sort').value);
             // console.log(JSON.stringify(ar_col));
            $.ajax({
                url:"pupils/fetchdata?page="+page
                    +"&countpupilsonpage="+countPupilsOnPage
                    +"&classeslist="+document.getElementById('filter').value
                    +"&sex="+document.getElementById('filter_sex').value
                    +"&snp="+document.getElementById('snp').value
                    +"&dt="+document.getElementById('filter_year').value
                    +"&arcol="+JSON.stringify(ar_col)
                    +"&sort="+document.getElementById('sort_f').value
                    +"&sortdir="+document.getElementById('sort_d').value
                ,
                success:function(data){
                    // console.log(data);
                    $('#dataT').html(data);
                     document.getElementById('timeLoad').innerHTML="Time loaded: "+(Date.now()-timerStart)+" ms";
                    // console.log("Time loaded: ", Date.now()-timerStart+" ms");
                }
            });
        }




        function getpupilinfo(id) {
            document.getElementById('f').reset();
            $.ajax({
                url: "/arm/pupil/edit/"+id,
                success: function (data) {
                    let obj = JSON.parse(data);
                    console.log(obj);
                    document.getElementById('id_f').value=obj.id;
                    document.getElementById('snp_f').value=obj.snp;
                    document.getElementById('alpha_f').value=obj.alpha;
                    $("#classes_f").val(obj.classes.id);
                    document.getElementById('dt_f').value=obj.dt;
                    $("#sex_f").val(obj.sex);
                    document.getElementById('contacts_f').value=obj.contacts;
                    document.getElementById('address_f').value=obj.address;
                    document.getElementById('parents_f').value=obj.parents;
                    for(let i=0;i<obj.pupilinsocialgroup.length;i++){
                        document.getElementById('sg'+obj.pupilinsocialgroup[i].socialgroup_id).checked=true;
                    }
                }
            });
        }

        $('.btnSubmit').click(function(event){
            // console.log("YES IT IS");
            event.preventDefault();
            $.ajax({
                type:"POST",
                url:"/arm/pupil/save",
                data: $("#f").serialize(),
                success: function(data){
                    console.log('Ajax responded');
                    document.getElementById('rebuild').click();
                    $('#exampleModal').modal('hide');
                    if(data.errors) {
                        // document.getElementById('errorAjax').innerHTML='';
                        // document.getElementById('errorAjax').style.display='block';
                        console.log('errors validation');
                        console.log(data.errors);
                        for(let key in data.errors)
                        {
                            console.log(key);
                            // document.getElementById('errorAjax').innerHTML+='<li>'+data.errors[key]+'</li>';
                        };
                    } else
                    {
                        console.log('NOT errors validation');
                        // $('#addMember').modal('hide');
                        // window.location.href = '/successAddQueryPartner';
                    }
                },
                error: function (data) {
                    concole.log(111);
                    console.log("777".data);
                    // $("#emailm").css('color','#fc0059').html(data.responseJSON.errors.email);
                    // console.log("data.responseJSON);
                    // console.log('Ajax not responded');
                }
            });
        });

    function sort(field){
        let prev_field = document.getElementById('sort_f').value;
        let dir = document.getElementById('sort_d').value;

        if(prev_field!=field) document.getElementById('sort_d').value='ASC';
         else
          if(dir == 'ASC') document.getElementById('sort_d').value='DESC';
            else document.getElementById('sort_d').value='ASC';
        document.getElementById('sort_f').value = field;

        fetch_data(1);
    }

    // function editpupil(id){
        //     let path='/arm/pupil/edit/'+id;
        //     myWin= open(path,"displayWindow,height=200","status=no,toolbar=no,menubar=no");
        // }
    </script>
</div><!-- /.page-wrapper -->

</body>
</html>
