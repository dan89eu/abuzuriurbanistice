<li class="{{ Request::is('admin/locations*') ? 'active' : '' }}">
    <a href="{!! route('admin.locations.index') !!}">
    <i class="livicon" data-c="#6CC66C" data-hc="#6CC66C" data-name="bank" data-size="18"
               data-loop="true"></i>
               Locations
    </a>
</li>

<li class="{{ Request::is('admin/statuses*') ? 'active' : '' }}">
    <a href="{!! route('admin.statuses.index') !!}">
    <i class="livicon" data-c="#31B0D5" data-hc="#31B0D5" data-name="list" data-size="18"
               data-loop="true"></i>
               Statuses
    </a>
</li>

<!--<li class="{{ Request::is('admin/locationStatuses*') ? 'active' : '' }}">
    <a href="{!! route('admin.locationStatuses.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="home" data-size="18"
               data-loop="true"></i>
               LocationStatuses
    </a>
</li>-->

<li class="{{ Request::is('admin/fileStatuses*') ? 'active' : '' }}">
    <a href="{!! route('admin.fileStatuses.index') !!}">
    <i class="livicon" data-c="#418BCA" data-hc="#418BCA" data-name="map" data-size="18"
               data-loop="true"></i>
               FileStatuses
    </a>
</li>

