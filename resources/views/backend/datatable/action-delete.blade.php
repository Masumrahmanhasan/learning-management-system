
@if(isset($allow_delete) && ($allow_delete == false))


<a href="#"  class="btn btn-red delete_warning mb-1" style="cursor:pointer; color: #fff">
    <i class="far fa-trash-alt"
       data-toggle="tooltip"
       data-placement="top" title=""
       data-original-title="Warning"></i>
</a>

@else

    @if(isset($class))
        <a data-method="delete" data-trans-button-cancel="{{__('buttons.general.cancel')}}"
           data-trans-button-confirm="{{__('buttons.general.crud.delete')}}" data-trans-title="{{__('strings.backend.general.are_you_sure')}}"
           class="{{$class}}" style="cursor:pointer;"
           onclick="$(this).find('form').submit();">
            {{__('buttons.general.crud.delete')}}
            <form action="{{$route}}"
                  method="POST" name="delete_item" style="display:none">
                @csrf
                {{method_field('DELETE')}}
            </form>
        </a>
    @else
        <a data-method="delete" data-trans-button-cancel="{{__('buttons.general.cancel')}}"
           data-trans-button-confirm="{{__('buttons.general.crud.delete')}}" data-trans-title="{{__('strings.backend.general.are_you_sure')}}"
           class="btn btn-red mb-1" style="cursor:pointer; color: #fff"
           onclick="$(this).find('form').submit();">
            <i class="far fa-trash-alt"
               data-toggle="tooltip"
               data-placement="top" title=""
               data-original-title="{{__('buttons.general.crud.delete')}}"></i>
            <form action="{{$route}}"
                  method="POST" name="delete_item" style="display:none">
                @csrf
                {{method_field('DELETE')}}
            </form>
        </a>
    @endif


@endif
