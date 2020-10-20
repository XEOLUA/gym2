@if(isset($pupils))
    <table class="rTable">
    <tr class="rTableRow">
        <th class="rTableHead col_id {{(!$ar_col['id']) ? 'col_off' : ''}}">#</th>
        <th style="cursor: pointer" onclick="sort('alpha');" class="rTableHead col_alpha {{(!$ar_col['alpha']) ? 'col_off' : ''}}">
            <span style="color: #00d75e; font-weight: bold; font-size: 19px">{!! $dir_sort=='ASC' && $fild_sort=='alpha' ? '&#8593;' : '' !!}{!! $dir_sort=='DESC' && $fild_sort=='alpha' ? '&#8595;' : '' !!}</span>Alpha
            </th>
        <th style="cursor: pointer" onclick="sort('snp');" class="rTableHead col_snp {{(!$ar_col['snp']) ? 'col_off' : ''}}">
            <span style="color: #00d75e; font-weight: bold; font-size: 19px">{!! $dir_sort=='ASC' && $fild_sort=='snp' ? '&#8593;' : '' !!}{!! $dir_sort=='DESC' && $fild_sort=='snp' ? '&#8595;' : '' !!}</span>ПІБ</th>
        <th style="cursor: pointer" onclick="sort('class_id');" class="rTableHead col_class {{(!$ar_col['class']) ? 'col_off' : ''}}">
            <span style="color: #00d75e; font-weight: bold; font-size: 19px">{!! $dir_sort=='ASC' && $fild_sort=='class_id' ? '&#8593;' : '' !!}{!! $dir_sort=='DESC' && $fild_sort=='class_id' ? '&#8595;' : '' !!}</span>Клас</th>
        <th style="cursor: pointer" onclick="sort('sex');" class="rTableHead col_sex {{(!$ar_col['sex']) ? 'col_off' : ''}}">
            <span style="color: #00d75e; font-weight: bold; font-size: 19px">{!! $dir_sort=='ASC' && $fild_sort=='sex' ? '&#8593;' : '' !!}{!! $dir_sort=='DESC' && $fild_sort=='sex' ? '&#8595;' : '' !!}</span>Стать</th>
        <th style="cursor: pointer" onclick="sort('dt');" class="rTableHead col_dt {{(!$ar_col['dt']) ? 'col_off' : ''}}">{!! $fild_sort=='dt' ? '<span style="color: #00d75e; font-weight: bold; font-size: 19px">&#8593;</span>':''!!}ДН</th>
        <th style="cursor: pointer" onclick="sort('contacts');" class="rTableHead col_contact {{(!$ar_col['contact']) ? 'col_off' : ''}}">Телефон</th>
        <th style="cursor: pointer" onclick="sort('address');" class="rTableHead col_address {{(!$ar_col['address']) ? 'col_off' : ''}}">{!! $fild_sort=='address' ? '<span style="color: #00d75e; font-weight: bold; font-size: 19px">&#8593;</span>':''!!}Домашня адреса</th>
        <th class="rTableHead col_teacher {{(!$ar_col['teacher']) ? 'col_off' : ''}}">Керівник</th>
        <th style="cursor: pointer" onclick="sort('social_group');" class="rTableHead col_social_group {{(!$ar_col['social_group']) ? 'col_off' : ''}}" style="white-space: nowrap;">
            <span style="color: #00d75e; font-weight: bold; font-size: 19px">{!! $dir_sort=='ASC' && $fild_sort=='social_group' ? '&#8593;' : '' !!}{!! $dir_sort=='DESC' && $fild_sort=='social_group' ? '&#8595;' : '' !!}</span>Соц гр</th>
        <th class="rTableHead"></th>
    </tr>
    @foreach($pupils as $pupil)
        <tr class="rTableRow">
            <td style="cursor: pointer" onclick="print({{$pupil->id}})" class="rTableCell col_id {{(!$ar_col['id']) ? 'col_off' : ''}}">{{($page-1)*$pagincnt+$loop->index+1}}</td>
            <td style="cursor: pointer" onclick="print({{$pupil->id}})" class="rTableCell col_alpha {{(!$ar_col['alpha']) ? 'col_off' : ''}}" style="white-space: nowrap;">{{$pupil->alpha}}</td>
            <td class="rTableCell col_snp {{(!$ar_col['snp']) ? 'col_off' : ''}}"  style="width: auto">{{$pupil->snp}}</td>
            <td class="rTableCell col_class {{(!$ar_col['class']) ? 'col_off' : ''}}" style="white-space: nowrap;">{{$pupil->classes->name}}</td>
            <td class="rTableCell col_sex {{(!$ar_col['sex']) ? 'col_off' : ''}}" style="text-align: center">{{$pupil->sex==1 ? 'ч' : 'ж'}}</td>
            <td class="rTableCell col_dt {{(!$ar_col['dt']) ? 'col_off' : ''}}" style="white-space: nowrap;">{{\Carbon\Carbon::parse($pupil->dt)->format('d.m.Y')}}</td>
            <td class="rTableCell col_contact {{(!$ar_col['contact']) ? 'col_off' : ''}}" style="white-space: nowrap;">{{$pupil->contacts}}</td>
            <td class="rTableCell col_address  {{(!$ar_col['address']) ? 'col_off' : ''}}">{{$pupil->address}}</td>
            <td class="rTableCell col_teacher {{(!$ar_col['teacher']) ? 'col_off' : ''}}">{!! \App\Services\snp::snpExplode($teachers[$pupil->classes->teacher_id])!!}</td>
            <td class="rTableCell col_social_group {{(!$ar_col['social_group']) ? 'col_off' : ''}}">
                @foreach($pupil->socialgroups as $sg)
                    <span>{{$sg->name}}</span>
                @endforeach
            </td>
            <td class="rTableCell"><a class="btn-primary btn btn-xs"
                                       style="padding: 1px; font-size: 9px; width:20px; margin: 0"
                                       title="Edit"
                                       href="#" onclick="getpupilinfo('{{$pupil->id}}')"
                                      data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-pencil-alt"></i></a>
{{--                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Large modal</button></td>--}}
        </tr>
    @endforeach
    </table>
    <div>{{ $pupils->links() }}</div> <div style="margin-top: -14px">Записів: {{$allRecords}}</div>
@endif
