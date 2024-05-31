@extends('layouts.layout')

@section("logo")
    {!! $config['logo'] !!}
@endsection

@section("subheader")
    <div class="subheader-text">{{ $config['modal_title'] }}</div>
@endsection


@section("breadcrumbs")
    <div class="trail"><a href="/">Home</a> > <a href="{{ $config['backlink'] }}">{{ $config["backlink_title"] }}</a> > <a href="/chapters/chapter-update">Chapter Update</a> >  <strong>Triskelions</strong></div>
@endsection

@section("maincontent")

<div class="text-white">
{{-- @php
    print_r($data);
    print_r($config);
@endphp --}}
</div>

<div class="mt-3">

    <a class="btn text-white bg-secondary ms-4 me-2" href="/chapters/chapter-update/{{ $data["fields_data"]["chapter_id"] }}">Details</a>
    <a class="btn text-dark bg-warning" href="/chapters/chapter-update/{{ $data["fields_data"]["chapter_id"] }}/triskelions">Triskelions</a>

</div>

<form class="form ajax_form" id="{{ $config["form"] }}">

    <div class="container-fluid bg-black text-white ps-4 pe-4 mt-4">
    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr>
                <th>Serial #</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>Suffix</th>
                <th class="text-end">Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data["triskelions"] as $triskelion)
            <tr>
                <td>{{ strtoupper($triskelion['serial_number']) }}</td>
                <td>{{ strtoupper($triskelion['firstname']) }}</td>
                <td>{{ strtoupper($triskelion['middlename']) }}</td>
                <td>{{ strtoupper($triskelion['lastname']) }}</td>
                <td>{{ strtoupper($triskelion['suffix']) }}</td>
                <td class="text-end">
                    <select class="">
                        <option>Active</option>
                        <option>Pending Registration Approval</option>
                        <option>Active - with Filed Complaint</option>
                        <option>Active - under Disciplinary Action</option>
                        <option>Suspended</option>
                        <option>Expelled</option>
                        <option>Illegitimate</option>
                    </select>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

</form>



@endsection
