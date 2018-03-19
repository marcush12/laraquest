@extends('template')
@section('content')
    <div class="container">
        <h1>{{ $question->title }}</h1>
        <p class="lead">
            {{ $question->description }}
        </p>
        <p>
            Submitted By: {{ $question->user->name }}, {{ $question->created_at->diffForHumans() }}
        </p>
        @if($question->user->id === Auth::id())
            <button class="btn btn-primary">Edit</button>
        @endif
        <hr>
        <!-- display all of the answers for this question -->
        @if($question->answers->count() >0)
            @foreach($question->answers as $answer)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            {{ $answer->content }}
                        </p>
                        <h6>Answered By {{ $answer->user->name }}, {{ $answer->created_at->diffForHumans() }}</h6>
                        @if($answer->user->id === Auth::id())
                            <button class="btn btn-primary">Edit</button>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>
                Não há respostas para essa questão ainda. Se você tiver uma resposta, por favor, poste-a abaixo.
            </p>
        @endif

        <hr>
        <!-- display the form to submit a new answer; a collection-->
        <form action="{{ route('answers.store') }}" method="POST">
            {{ csrf_field() }}
            <h4>Submit your own answer:</h4>
            <textarea name="content" rows="4" class="form-control"></textarea>
            <input type="hidden" value="{{ $question->id }}" name='question_id'>
            <button class="btn btn-primary">Submit Answer</button>
         </form>
    </div>
@endsection
