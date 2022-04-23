@extends('layouts.admin.admin-layout')
@section('title', 'Dashboard')
@push('page-style')
@endpush

@section('page-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Contact Show</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact Show</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <a href="{{ route('admin.contact.index') }}" class="btn btn-info btn-sm">
                <i class="fas fa-arrow-alt-circle-left"></i>
                <span>Back To List</span>
              </a>
            </h3>
          </div>
          <div class="card-body">
            <table class="table">
              <tbody class="border border-top-0">
                <tr class="row m-0 w-100">
                  <th scope="row" class="col-md-2 d-flex justify-content-between">Name <span>:</span>
                    </th>
                  <td class="col-md-10">{{ $contact->name }}</td>
                </tr>
                <tr class="row m-0 w-100">
                    <th scope="row" class="col-md-2 d-flex justify-content-between">
                      Email <span>:</span></th>
                    <td class="col-md-10">{{ $contact->email }}</td>
                </tr>
                <tr class="row m-0 w-100">
                  <th scope="row" class="col-md-2 d-flex justify-content-between">Subject
                    <span>:</span>
                  </th>
                    <td class="col-md-10">{{ $contact->subject }}</td>
                </tr>
                <tr class="row m-0 w-100">
                  <th scope="row" class="col-md-2 d-flex justify-content-between">
                    Message <span>:</span></th>
                  <td class="col-md-10">{{ $contact->message }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection

@push('page-js')
@endpush



