@extends('layouts.app')

@section('body')

@if ( session()->has('message') )
 <div class="flex items-center bg-green text-white text-sm font-bold px-4 py-3" role="alert">
  <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
  <p>{{ session()->get('message') }}</p>
</div>

@endif

<div class="h-full flex items-center justify-center ">
    <form class="w-full max-w-md shadow-md p-6" action="{{ route('kudo.store') }}" method="POST">
      @csrf()
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-grey-darker text-base font-bold mb-2" for="grid-from">
            From *
          </label>
          <select id="from-input" class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey {{$errors->has('from')? 'border-red' : 'border-grey-lighter'}}" id="grid-from" type="text" name="from" placeholder="Doe" value="{{ old('from') }}"></select>
          @if ($errors->has('from'))
            <p class="text-red text-xs italic">{{ $errors->first('from', ':message') }}</p>
          @endif
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-to">
            To *
          </label>
          <select id="to-input" class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey {{$errors->has('to')? 'border-red' : 'border-grey-lighter'}}" id="grid-to" type="text" name="to" placeholder="Jane" value="{{ old('to') }}"> </select>
          @if ($errors->has('to'))
            <p class="text-red text-xs italic">{{ $errors->first('to', ':message') }}</p>
          @endif
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
            You *
          </label>
          @if ($errors->has('option'))
            <p class="text-red text-xs italic">{{ $errors->first('option', ':message') }}</p>
          @endif

          <div class="md:flex flex-wrap mb-6">
          @foreach($options as $option)
            <div class="md:w-1/2 -mx-2 mb-6">
              <label class="block text-grey-dark font-bold">
                <input class="mr-2 leading-tight" type="radio" name="option[]"  value="{{ $option->id }}" {{ old('option[]') == $option->id ? 'checked' : 'false' }} />
                <span class="text-sm">{{ $option->text }}</span>
              </label>
            </div>
          @endforeach
          </div>
          <p class="text-grey text-xs italic">You can choose more than one :)</p>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3 mb-6 ">
          <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
            Mensaje
          </label>
          <textarea class="appearance-none block w-full bg-grey-lighter text-grey-darker border rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey resize-none {{$errors->has('message')? 'border-red' : 'border-grey-lighter'}}" id="grid-message" name="message">{{ old('message') }}</textarea>
          <p class="text-grey text-xs italic">Max. 240</p>
          @if ($errors->has('message'))
            <p class="text-red text-xs italic">{{ $errors->first('message', ':message') }}</p>
          @endif
        </div>
      </div>
      <div class="md:flex">
        <div class="md:w-1/3"><div>
        <div class="md:w-2/3">
          <button class="shadow bg-blue hover:bg-blue-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
            Send!
          </button>
        </div>
      </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/choices.js@4/public/assets/scripts/choices.min.js"></script>
<script>
new Choices(document.getElementById('from-input'), {
    choices: {!! $activeCollaborators !!}
});
new Choices(document.getElementById('to-input'), {
    choices: {!! $inactiveCollaborators !!}
});
</script>

@endsection