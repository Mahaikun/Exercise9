@extends('base')
@section('main')
@if(auth()->check())

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="row">

                <div class="col-sm-12">
                  @if(session()->get('success'))
                    <div class="alert alert-success text-center">
                      {{ session()->get('success') }}
                    </div>
                  @endif
                </div>

                <div class="col-sm-12">
                <br />
                <h3 class="display-5 text-center">Student List</h3>
                  <table class="table table-striped">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th colspan="2" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $count => $student)
                        <tr>
                            <td>{{++$count}}</td>
                            <td><a href="{{ route('students.show',$student->id)}}">{{$student->first_name}} {{$student->last_name}}</a></td>
                            <td>{{$student->email}}</td>
                            <td class="text-center">
                                <a href="{{ route('students.edit',$student->id)}}" class="btn btn-primary btn-block">Edit</a>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('students.destroy', $student->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger btn-block" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="text-center">
                    <a style="margin: 19px;" href="{{ route('students.create')}}" class="btn btn-primary">New Student Details</a>
                  </div>
                <div>

                </div>
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}



</x-app-layout>



@else
{{-- invalid user will be redirect to index page --}}
<script>window.location = "/login";</script>
@endif
@endsection
