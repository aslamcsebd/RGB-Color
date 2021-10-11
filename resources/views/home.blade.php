@extends('layouts.app')

@section('content')
   <div class="container-fluid ">
      <div class="row justify-content-center">
         <div class="col-md-5 m-3">
            <div class="card ">
               <div class="card-header text-light text-center bg-info">RGB Vs Hex Color Code</div>

                  @if (session('success'))
                     <div class="alert alert-success">
                        <strong>Success!</strong> {{ session('success') }}
                     </div>
                  @endif

               <div class="card-body">
                  <form method="POST" action="{{ url('rgb') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <div class="row justify-content-center text-center">                     
                           <label class="col-3 col-form-label">Red</label>                        
                           <label class="col-3 col-form-label">Green</label>                        
                           <label class="col-3 col-form-label">Blue</label>                        
                        </div>         
                        <div class="form-group row justify-content-center">
                           <label class="col-2 col-form-label text-center">Input</label>
                           <div class="col">
                              <input type="text" class="form-control" name="red" value="{{ old('red') }}" required placeholder="Max:255">
                           </div>
                            <div class="col">
                              <input type="text" class="form-control" name="green" value="{{ old('green') }}" required placeholder="Max:255">
                           </div>
                            <div class="col">
                              <input type="text" class="form-control" name="blue" value="{{ old('blue') }}" required placeholder="Max:255">
                           </div>                          
                           <button type="submit" class="col-2 btn btn-primary">Search</button>
                        </div>
                        <div class="row justify-content-center">
                           <small class="text-center text-danger">Red*Green*Blue = Multiple number create</small>
                        </div>
                     </div>
                  </form>
                  <form method="POST" action="{{ url('fixed_RGB') }}" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <div class="form-group row justify-content-center">
                           <label class="col-2 col-form-label fixed text-center">Fixed color</label>
                           <div class="col">
                              <input type="text" class="form-control" name="red" value="{{ old('red') }}" required placeholder="Number">
                           </div>
                            <div class="col">
                              <input type="text" class="form-control" name="green" value="{{ old('green') }}" required placeholder="Number">
                           </div>
                            <div class="col">
                              <input type="text" class="form-control" name="blue" value="{{ old('blue') }}" required placeholder="Number">
                           </div>                          
                           <button type="submit" class="col-2 btn btn-success">Search</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      @if(isset($total))
         <fieldset>
            <legend>Total Color [{{$total}}]</legend>

            <div class="row justify-content-center">               
               @php $k=1 @endphp
                  @for($r=0; $r<=$red; $r++)
                     @for($g=0; $g<=$green; $g++)
                        @for($b=0; $b<=$blue; $b++)
                                          
                           <div class="col-3">
                              <div class="border m-1">
                                 <div class=" @if($k%2==0) rgb_even @else rgb_odd @endif " style="background-color: rgb({{$r}}, {{$g}}, {{$b}});">                     
                                 </div>
                                 <div class="row text-center">
                                    <table class="col">
                                       <tr>
                                          <td>
                                             <span id="rgb{{$k}}">rgb({{$r}}, {{$g}}, {{$b}})</span>
                                          </td>
                                          <td>
                                             <span id="hex{{$k}}">{{$color = sprintf("#%02x%02x%02x", $r, $g, $b)}}</span>
                                          </td>
                                       </tr>

                                       <tr>
                                          <td>
                                             <button class="btn-secondary copy" data-clipboard-target="#rgb{{$k}}">Copy : RGB</button>
                                          </td>
                                          <td>
                                             <button class="btn-info copy" data-clipboard-target="#hex{{$k}}">Copy : Hex</button>
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>   
                           </div>
                           
                           @php $k++; @endphp
                        @endfor
                     @endfor
                  @endfor
            </div> 
         </fieldset>
      @endif

      @if(isset($fixed_RGB))
         <fieldset>
            <legend>Total Color [1]</legend>

            <div class="row justify-content-center">
               @php $k=1 @endphp        
                  <div class="col-3">
                     <div class="border m-1">                        
                        <div class="rgb_odd text-center" style="background-color: rgb({{$red}}, {{$green}}, {{$blue}});">                      
                        </div>
                        <div class="row text-center">
                           <table class="col">
                              <tr>
                                 <td>
                                    <span id="rgb{{$k}}">rgb({{$red}}, {{$green}}, {{$blue}})</span>
                                 </td>
                                 <td>
                                    <span id="hex{{$k}}">{{$color = sprintf("#%02x%02x%02x", $red, $green, $blue)}}</span>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <button class="btn-secondary copy" data-clipboard-target="#rgb{{$k}}">Copy : RGB</button>
                                 </td>
                                 <td>
                                    <button class="btn-info copy" data-clipboard-target="#hex{{$k}}">Copy : Hex</button>
                                 </td>
                              </tr>
                           </table>
                        </div>
                     </div> 
                  </div>               
               @php $k++; @endphp
            </div>
         </fieldset>
      @endif
   </div>

@endsection
