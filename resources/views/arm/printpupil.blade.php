<div style="text-align: center">
    <img src="{{url('images/gua.png')}}" alt="" style="height: 70px">
    <div style="text-transform: uppercase; line-height: 30px;">
        хмельницька міська рада
    </div>
    <div style="text-transform: uppercase; line-height: 30px; font-weight: bold">
        гімназія №2 м. Хмельницького
    </div>
    <div>
        пр.Миру, 84/2 м. Хмельницький, Хмельницька область 29015 тел./факс 0382 63-27-32,
        е-mail: liceum11khm@gmail.com   код ЄДРПОУ 25908321
    </div>
</div>
<div style="margin: 30px">
    <span>{{\Carbon\Carbon::now()->format('d.m.Y')}} </span>
    <span style="margin: 30px">№ 01-42/348</span>
</div>
<div style="text-align: center; text-transform: uppercase; margin: 50px 0 0 0">довідка</div>
<div style="margin: 30px; text-align: justify">
    Дана <span style="font-weight: bold">{{$pupil->snp}} {{$pupil->dt}}</span> в тому, що
    {{$pupil->sex==1 ? 'він' : 'вона'}}
    дійсно навчається в {{$pupil->classes->name}} класі гімназії №2 м.Хмельницького.<br><br>
    Довідка видана для пред’явлення за місцем вимоги
</div>
<div style="margin: 50px">
    <span>Директор гімназії №2</span>
    <span style="margin-left: 200px">В.БАЙДИЧ</span>
</div>


