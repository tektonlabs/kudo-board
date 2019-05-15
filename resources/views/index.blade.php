@extends('layouts.app')

@section('body')

<div class="h-screen w-4/5 mx-auto flex text-center flex-col">

    @if ( session()->has('message') )
     <div class="flex items-center bg-green text-white text-sm font-bold px-4 py-3" role="alert">
      <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
      <p>{{ session()->get('message') }}</p>
    </div>
    @endif

    <div class="mb-6 m px-4 py-3 text-right">
        <a class="shadow bg-blue hover:bg-blue-light focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded no-underline" href="{{route('kudo.create')}}">Give a Kudo card</a>
    </div>

    @if($kudos->isNotEmpty())
        <table class="shadow border border-solid border-grey-light px-1 py-2">
            <thead>
                <tr class="text-grey-lightest bg-grey-darkest">
                    <th class="border border-solid border-grey-light px-1 py-2">#</th>
                    <th class="border border-solid border-grey-light px-1 py-2">To</th>
                    <th class="border border-solid border-grey-light px-1 py-2">From</th>
                    <th class="border border-solid border-grey-light px-1 py-2">Message</th>
                    <th class="border border-solid border-grey-light px-1 py-2">You...</th>
                    <th class="border border-solid border-grey-light px-1 py-2">When?</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kudos as $kudo)
                <tr>
                    <td class="border border-solid border-grey-light px-1 py-2">{{$loop->iteration}}</td>
                    <td class="border border-solid border-grey-light px-1 py-2">{{$kudo->to}}</td>
                    <td class="border border-solid border-grey-light px-1 py-2">{{$kudo->from}}</td>
                    <td class="border border-solid border-grey-light px-1 py-2">{{$kudo->message}}</td>
                    <td class="text-left border border-solid border-grey-light px-1 py-2">
                        <ul class="list-reset">
                            @foreach($kudo->options as $option)
                            <li> - {{$option->text}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="border border-solid border-grey-light px-1 py-2">{{$kudo->created_at->format('M jS - h:m a')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="ml-auto my-6">
            {{ $kudos->links() }}
        </div>
    @else
        <div class="mb-6">There's no kudos yet.</div>
    @endif
</div>

@endsection
