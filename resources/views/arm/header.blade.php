<div class="topbar-one" style="position: fixed; width:100%; height: 58px; font-zie:12px; line-height: normal">
    <div class="container" style="margin-left: 0">
        <div class="topbar-one__left" style="display: block">

            <div>
                <input type="text" placeholder="ПІБ учня" name="snp" id="snp" style="margin: 0; padding: 0;
                line-height: normal; height:24px; border-radius: 2px; border: 1px solid silver">
                <a href="{{url('/')}}">Головна</a>
{{--                <select id="field_sort" style="height:24px; border-radius: 2px; border: 1px solid silver">--}}
{{--                    <option value="">ПІБ</option>--}}
{{--                    <option value="alpha">Альфа</option>--}}
{{--                    <option value="class_id">Клас</option>--}}
{{--                    <option value="sex">Стать</option>--}}
{{--                    <option value="dt">ДН</option>--}}
{{--                    <option value="address">Адреса</option>--}}
{{--                    <option value="social_group">Соц гр</option>--}}
{{--                </select>--}}
                <input type="hidden" value="snp" id="sort_f">
                <input type="hidden" value="ASC" id="sort_d">
            </div>
            <div>
                <input type="checkbox" class="col_on_off" checked id="column_id" title="№">
                <input type="checkbox" class="col_on_off" checked id="column_alpha" title="Альфа">
                <input type="checkbox" class="col_on_off" checked id="column_snp" title="ПІБ">
                <input type="checkbox" class="col_on_off" checked id="column_class" title="Клас">
                <input type="checkbox" class="col_on_off" id="column_sex" title="Стать">
                <input type="checkbox" class="col_on_off" id="column_dt" title="Дата народження">
                <input type="checkbox" class="col_on_off" id="column_contact" title="Телефон">
                <input type="checkbox" class="col_on_off" id="column_address" title="Домашня адреса">
                <input type="checkbox" class="col_on_off" id="column_teacher" title="Класний керівник">
                <input type="checkbox" class="col_on_off" id="column_social_group" title="Соціальна група">
            </div>
        </div><!-- /.topbar-one__left -->
        <div class="topbar-one__right">
            @if(!auth()->check())
                {{--                    <a class="nav-link btn_registr" href="{{route('register')}}">Реєстрація</a>--}}
                <a class="nav-link" href="{{route('login')}}">Вхід</a>
            @else
                <li style="list-style-type: none;">
                <span onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="cursor:pointer;color:#ffffff">
                                                        {{explode("@",Auth::user()->email)[0]}}
                                <svg style="height:20px; fill:#ffffff" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16 svg_exit" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </span>
                </li>
            @endif

            {{--            <a href="#">Login</a>--}}
            {{--            <a href="#">Register</a>--}}
        </div><!-- /.topbar-one__right -->
    </div><!-- /.container -->
</div><!-- /.topbar-one -->
