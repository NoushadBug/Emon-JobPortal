@extends('layouts.admin.admin-layout')
@section('title', 'Show Company Details')
@push('page-css')
@endpush

@section('page-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Company Details</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Details Show</li>
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
              <a href="{{ route('admin.company.index') }}" class="btn btn-info btn-sm">
                <i class="fas fa-arrow-alt-circle-left"></i>
                <span>Back To List</span>
              </a>
            </h3>
          </div>
          <div class="card-body">
            <h4 class="pt-2 pb-3 text-center">{{ $company->company_name }} Information</h4>
            <table class="table">
              <tbody class="border border-top-0">
                <tr class="row m-0 w-100">
                  <th scope="row" class="col-md-2 d-flex justify-content-between">Company Name <span>:</span>
                    </th>
                  <td class="col-md-10">{{ $company->company_name }}</td>
                </tr>
                <tr class="row m-0 w-100">
                    <th scope="row" class="col-md-2 d-flex justify-content-between">
                      Company Address <span>:</span></th>
                    <td class="col-md-10">{{ $company->company_address }}</td>
                </tr>
                <tr class="row m-0 w-100">
                  <th scope="row" class="col-md-2 d-flex justify-content-between">
                    Industry Type <span>:</span></th>
                  <td class="col-md-10">{{ $company->industry->industry_name }}</td>
                </tr>
                <tr class="row m-0 w-100">
                  <th scope="row" class="col-md-2 d-flex justify-content-between">
                    Employee Size <span>:</span></th>
                  <td class="col-md-10">{{ $company->employee_size }}</td>
                </tr>
                <tr class="row m-0 w-100">
                  <th scope="row" class="col-md-2 d-flex justify-content-between">
                    Trade License <span>:</span></th>
                  <td class="col-md-10">{{ $company->trade_license }}</td>
                </tr>
                <tr class="row m-0 w-100">
                  <th scope="row" class="col-md-2 d-flex justify-content-between">
                    Website URL <span>:</span></th>
                  <td class="col-md-10">{{ $company->website_url }}</td>
                </tr>
                <tr class="row m-0 w-100">
                  <th scope="row" class="col-md-2 d-flex justify-content-between">
                    District <span>:</span></th>
                  <td class="col-md-10">{{ $company->district }}</td>
                </tr>
                <tr class="row m-0 w-100">
                  <th scope="row" class="col-md-2 d-flex justify-content-between">
                    Thana <span>:</span></th>
                  <td class="col-md-10">{{ $company->thana }}</td>
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



