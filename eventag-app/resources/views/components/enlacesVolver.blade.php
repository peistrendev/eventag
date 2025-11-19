 @if(url('event/all'))

    {{url('event/dash')}}

@elseif(url('visitor/all'))

  {{url('event/all')}}
                  
@endif