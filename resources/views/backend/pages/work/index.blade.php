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
        <h4 class="card-title">Table of your works</h4>
        <div class="table-responsive pt-3">
            <a href="{{url('admin/work/add')}}" class="btn btn-warning mb-4 ml-0">ADD NEW</a>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>
                    SN:
                  </th>
                <th>
                  Title
                </th>
                <th>
                  Heading1
                </th>
                <th>
                 Heading1
                </th>
                <th>
                  Details1
                </th>
                <th>
                  Details2
                </th>
                <th>
                  Thumbnail
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
                @php
                    $i=1;
                @endphp
                @foreach ($works as $work)
                <tr class="table-info">
                    <td>
                        {{$i++}}
                    </td>
                    <td>
                      {{$work['title']}}
                    </td>
                    <td>
                        {{Str::limit( $work['heading1'] ,15) }}
                    </td>
                    <td>
                        {{ Str::limit( $work['heading1'] ,15) }}
                    </td>
                    <td>
                        {{ Str::limit( $work['details1'] ,50) }}
                    </td>
                    <td>
                        {{ Str::limit( $work['details1'],50) }}
                    </td>
                    <td>
                        <img style="height: 50px; width:70px" src="{{asset('storage/images/work/'.$work['thumbnail'])}}" alt="" srcset="">
                    </td>
                    <td class="text-center">
                      <a href="javascript:void(0);"  class="confirmDelete"  record="work" recordid="{{$work['id']}}"> <i title="Delete" class="mdi mdi-delete-variant"></i></a> | <a href="{{url('admin/work/edit',$work['id'])}}"><i title="Edit" class="mdi mdi-lead-pencil"></i></a>
                    </td>
                    <td>
                        @if ($work['status']==1)
                        <a href="javascript:void(0)" class="updateWorkStatus" id="work-{{$work['id']}}" work_id="{{$work['id']}}"> <i class="mdi mdi-toggle-switch"  title="Status Off" status="Active"></i></a>
                         @else
                         <a href="javascript:void(0)" class="updateWorkStatus"  id="work-{{$work['id']}}" work_id="{{$work['id']}}"> <i class="mdi mdi-toggle-switch-off" title="Status On" status="Disabled"></i></a>
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
