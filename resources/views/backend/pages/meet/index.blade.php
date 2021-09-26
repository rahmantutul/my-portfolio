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
        <h4 class="card-title">Table with socila meets</h4>
        <div class="table-responsive pt-3">
          <a href="{{url('admin/meet/add')}}" class="btn btn-warning mb-4">ADD NEW</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                  Id
                </th>
                <th>
                  Title1
                </th>
                <th>
                  Title2
                </th>
                <th>
                  Details1
                </th>
                <th>
                  Details2
                </th>
                <th>
                  Image
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
                @foreach ($meets as $meet)
                <tr class="table-info">
                    <td>
                      {{$meet['id']}}
                    </td>
                    <td>
                        {{Str::limit( $meet['heading1']) }}
                    </td>
                    <td>
                        {{ Str::limit( $meet['heading2']) }}
                    </td>
                    <td>
                        {{ Str::limit( $meet['details1'],50) }}
                    </td>
                    <td>
                        {{ Str::limit( $meet['details2'],50) }}
                    </td>
                    <td>
                        <img style="height: 50px; width:70px" src="{{asset('storage/images/meet/'.$meet['image'])}}" alt="" srcset="">
                    </td>
                    <td class="text-center">
                      <a href="javascript:void(0);"  class="confirmDelete"  record="meet" recordid="{{$meet['id']}}"> <i title="Delete" class="mdi mdi-delete-variant"></i></a> | <a href="{{url('admin/meet/edit',$meet['id'])}}"><i title="Edit" class="mdi mdi-lead-pencil"></i></a>
                    </td>
                    <td>
                        @if ($meet['status']==1)
                        <a href="javascript:void(0)" class="updateMeetStatus" id="meet-{{$meet['id']}}" meet_id="{{$meet['id']}}"> <i class="mdi mdi-toggle-switch"  title="Status On" status="Active"></i></a>
                         @else
                         <a href="javascript:void(0)" class="updateMeetStatus"  id="meet-{{$meet['id']}}" meet_id="{{$meet['id']}}"> <i class="mdi mdi-toggle-switch-off" title="Status Off" status="Disabled"></i></a>
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
