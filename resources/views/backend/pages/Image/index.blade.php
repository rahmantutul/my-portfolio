@php
    use Illuminate\Support\Str;
@endphp
@extends('backend.pages.app')
@section('style')

@endsection

@section('content')
<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Table with socila logos</h4>
        <div class="table-responsive pt-3">
          <a href="{{url('admin/logo/add')}}" class="btn btn-warning mb-4">ADD NEW</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  Id
                </th>
                <th>
                  Header Logo
                </th>
                <th>
                 Banner Video
                </th>
                <th>
                  Parallax Image
                </th>
                <th>
                  Footer Image
                </th>
                <th>
                  Actions
                </th>
                <th>
                    Status
                </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($logos as $logo)
                <tr class="table-info">
                    <td>
                      {{$logo['id']}}
                    </td>
                    <td>
                        <img style="height: 50px; width:90px" src="{{asset('storage/images/logo/'.$logo['header_logo'])}}" alt="" srcset="">
                    </td>
                    <td>
                        <video width="200px" height="100px" autoplay controls>
                            <source src="{{asset('storage/videos/'.$logo['video'])}}" type="video/mp4">
                          </video>
                        </div>
                    </td>
                    <td>
                        <img style="height: 50px; width:90px" src="{{asset('storage/images/logo/'.$logo['parallax'])}}" alt="" srcset="">
                    </td>
                    <td>
                        <img style="height: 50px; width:90px" src="{{asset('storage/images/logo/'.$logo['footer_logo'])}}" alt="" srcset="">
                    </td>
                    <td class="text-center">
                      <a href="javascript:void(0);"  class="confirmDelete"  record="logo" recordid="{{$logo['id']}}"> <i title="Delete" class="mdi mdi-delete-variant"></i></a> | <a href="{{url('admin/logo/edit',$logo['id'])}}"><i title="Edit" class="mdi mdi-lead-pencil"></i></a>
                    </td>
                    <td>
                        @if ($logo['status']==1)
                        <a href="javascript:void(0)" class="updateLogoStatus" id="logo-{{$logo['id']}}" logo_id="{{$logo['id']}}"> <i class="mdi mdi-toggle-switch"  title="Status On" status="Active"></i></a>
                         @else
                         <a href="javascript:void(0)" class="updateLogoStatus"  id="logo-{{$logo['id']}}" logo_id="{{$logo['id']}}"> <i class="mdi mdi-toggle-switch-off" title="Status Off" status="Disabled"></i></a>
                        @endif
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@stop

@section('javascript')
@endsection
