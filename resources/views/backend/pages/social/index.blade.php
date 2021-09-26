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
        <h4 class="card-title">Table with socila links</h4>
        <p class="card-description">
        <div class="table-responsive pt-3">
          <a href="{{url('admin/social/add')}}" class="btn btn-warning mb-4">ADD NEW</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  Id
                </th>
                <th>
                  Facebook
                </th>
                <th>
                  Tweeter
                </th>
                <th>
                  Instagram
                </th>
                <th>
                  Vimeo
                </th>
                <th>
                  Google Map
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
                @foreach ($links as $link)
                <tr class="table-info">
                    <td>
                      {{$link['id']}}
                    </td>
                    <td>
                        {{Str::limit( $link['facebook'] ,15) }}
                    </td>
                    <td>
                        {{ Str::limit( $link['tweeter'] ,15) }}
                    </td>
                    <td>
                        {{ Str::limit( $link['instagram'] ,15) }}
                    </td>
                    <td>
                        {{ Str::limit( $link['vimeo'],15) }}
                    </td>
                    <td>
                        {{ Str::limit( $link['googleMap'] ,15) }}
                    </td>
                    <td class="text-center">
                      <a href="javascript:void(0);"  class="confirmDelete"  record="social" recordid="{{$link['id']}}"> <i title="Delete" class="mdi mdi-delete-variant"></i></a> | <a href="{{url('admin/social/edit',$link['id'])}}"><i title="Edit" class="mdi mdi-lead-pencil"></i></a>
                    </td>
                    <td>
                        @if ($link['status']==1)
                        <a href="javascript:void(0)" class="updateLinkStatus" id="link-{{$link['id']}}" link_id="{{$link['id']}}"> <i class="mdi mdi-toggle-switch"  title="Status ON" status="Active"></i></a>
                         @else
                         <a href="javascript:void(0)" class="updateLinkStatus"  id="link-{{$link['id']}}" link_id="{{$link['id']}}"> <i class="mdi mdi-toggle-switch-off" title="Status Off" status="Disabled"></i></a>
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
