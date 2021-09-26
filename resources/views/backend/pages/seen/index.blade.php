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
        <h4 class="card-title">Table with socila seens</h4>
        <div class="table-responsive pt-3">
          <a href="{{url('admin/seen/add')}}" class="btn btn-warning mb-4">ADD NEW</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  Id
                </th>
                <th>
                  Image
                </th>
                <th>
                 Details
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
                @foreach ($seens as $seen)
                <tr class="table-info">
                    <td>
                      {{$seen['id']}}
                    </td>
                    <td>
                        {{ Str::limit( $seen['details'],150) }}
                    </td>
                    <td>
                        <img style="height: 50px; width:70px" src="{{asset('storage/images/seen/'.$seen['image'])}}" alt="" srcset="">
                    </td>
                    <td class="text-center">
                      <a href="javascript:void(0);"  class="confirmDelete"  record="seen" recordid="{{$seen['id']}}"> <i title="Delete" class="mdi mdi-delete-variant"></i></a> | <a href="{{url('admin/seen/edit',$seen['id'])}}"><i title="Edit" class="mdi mdi-lead-pencil"></i></a>
                    </td>
                    <td>
                        @if ($seen['status']==1)
                        <a href="javascript:void(0)" class="updateSeenStatus" id="seen-{{$seen['id']}}" seen_id="{{$seen['id']}}"> <i class="mdi mdi-toggle-switch"  title="Status On" status="Active"></i></a>
                         @else
                         <a href="javascript:void(0)" class="updateSeenStatus"  id="seen-{{$seen['id']}}" seen_id="{{$seen['id']}}"> <i class="mdi mdi-toggle-switch-off" title="Status Off" status="Disabled"></i></a>
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
