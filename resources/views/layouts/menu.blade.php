<li class="{{ Request::is('pemandus*') ? 'active' : '' }}">
    <a href="{!! route('pemandus.index') !!}"><i class="fa fa-edit"></i><span>Pemandus</span></a>
</li>

<li class="{{ Request::is('bahasas*') ? 'active' : '' }}">
    <a href="{!! route('bahasas.index') !!}"><i class="fa fa-edit"></i><span>Bahasas</span></a>
</li>

<li class="{{ Request::is('destinasis*') ? 'active' : '' }}">
    <a href="{!! route('destinasis.index') !!}"><i class="fa fa-edit"></i><span>Destinasis</span></a>
</li>

<li class="{{ Request::is('wisatawans*') ? 'active' : '' }}">
    <a href="{!! route('wisatawans.index') !!}"><i class="fa fa-edit"></i><span>Wisatawans</span></a>
</li>

<li class="{{ Request::is('pemanduBs*') ? 'active' : '' }}">
    <a href="{!! route('pemanduBs.index') !!}"><i class="fa fa-edit"></i><span>PemanduBs</span></a>
</li>

<li class="{{ Request::is('bahasaPemandus*') ? 'active' : '' }}">
    <a href="{!! route('bahasaPemandus.index') !!}"><i class="fa fa-edit"></i><span>BahasaPemandus</span></a>
</li>

<li class="{{ Request::is('destinasiPemandus*') ? 'active' : '' }}">
    <a href="{!! route('destinasiPemandus.index') !!}"><i class="fa fa-edit"></i><span>DestinasiPemandus</span></a>
</li>

<li class="{{ Request::is('histories*') ? 'active' : '' }}">
    <a href="{!! route('histories.index') !!}"><i class="fa fa-edit"></i><span>Histories</span></a>
</li>

<li class="{{ Request::is('beritas*') ? 'active' : '' }}">
    <a href="{!! route('beritas.index') !!}"><i class="fa fa-edit"></i><span>Beritas</span></a>
</li>

