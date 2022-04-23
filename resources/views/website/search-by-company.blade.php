@extends('layouts.website.website-layouts')
@section('page-title', '')
@push('page-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css"/>
<style>
.search-menu{
  background: rgb(204, 204, 204);
  padding: 10px;
}
.search-menu ul li form > [type=submit] {
  border: 0;
  background: none;
  color: #8A0000;
  font-weight: 500;
  width: 20px;
  background: #858585;
  color: white;
  border-radius: 3px;
  font-size: 13px;
}
.emp-wrap {
  padding: 0px 0px 4px 0px;
  margin: 0px 0px 0px 0px;
  border: 1px solid #e2e2e2;
  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;
  position: relative;
  background: #fff;
}
.org-t {
  display: table;
  width: 100%;
  table-layout: fixed;
}
.org-t>div {
  display: table-cell;
  border: 1px solid #fff;
  padding: 7px 5px 7px 8px;
  vertical-align: top;
}
.Snum {
  width: 50px;
  text-align: center;
}
.O-title {
  font-weight: bold;
  background-color: #babdc0;
  /* color: #545454; */
  color: #4c4c4c;
}
.org-t>div {
  display: table-cell;
  border: 1px solid #fff;
  padding: 7px 5px 7px 8px;
  vertical-align: top;
}
.Org-name {
  width: auto;
}
.Org-name span {
  display: none;
}
.Numojob {
  width: 100px;
  text-align: center;
}
.O-title {
  font-weight: bold;
  background-color: #babdc0;
  /* color: #545454; */
  color: #4c4c4c;
}
.O-res-O {
  background-color: #f3f3f3;
}
.card{
  background: rgb(255, 255, 255);
  padding: 10px;
  box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
}
body{
  background: rgb(231, 231, 231);
}
/* Pagination Css */
.hidden{
  padding: 10px;
}
.page .inline-flex{
  width: 38px;
  height: 38px;
  margin-right: 10px;
  border-radius: 7px;
  background: gray !important;
  color: white;
}
.container{
    
}
</style>
@endpush
@section('page-content')

<section style="color: ">
  <div class="container">
    <div class="card">
      <div class="row">
        @isset($searchWord)
        <div class="col-12">
          <p class="text-center py-3">Please click at the company name to view offering jobs</p>
          <div class="search-menu mb-3">
            <ul class="nav flex-row justify-content-between">
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="A" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="B" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="C" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="D" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="E" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="F" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="G" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="H" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="I" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="J" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="K" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="L" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="M" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="N" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="O" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="P" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="Q" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="R" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="S" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="T" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="U" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="V" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="W" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="X" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="Y" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="Z" name="searc_word">
                    </form>
                </li>
            </ul>
          </div>
          <div class="emp-wrap"> 
            <div class="org-t O-res">
              <div class="Snum O-title">SL.</div>
              <div class="Org-name O-title">Company Name <span>(No. of Jobs)</span></div>
              <div class="Numojob O-title">No. of Jobs</div>
            </div>
            @foreach ($companies as $key=>$company)
            <div class="org-t O-res O-res-O">
              <div class="Snum">
                {{ $key + 1 }}
              </div>
              <div class="Org-name">
                <a class="sub_window_new_update" id="ViewAllJobs0" href="{{ route('company.job.posts', $company->id) }}">
                  {{ $company->company_name }}
                </a>
              </div>
              <div class="Numojob">
                  {{ count($company->jobPost) }}
              </div>
            </div>
            @endforeach
            <p class="pagination px-2">
              {{ $companies->links() }}
            </p>
          </div>
        </div>
        @else
        <div class="col-12">
          <p class="text-center py-3">Please click at the company name to view offering jobs</p>
          <div class="search-menu mb-3">
            <ul class="nav flex-row justify-content-between">
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="A" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="B" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="C" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="D" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="E" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="F" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="G" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="H" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="I" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="J" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="K" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="L" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="M" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="N" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="O" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="P" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="Q" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="R" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="S" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="T" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="U" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="V" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="W" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="X" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="Y" name="searc_word">
                    </form>
                </li>
                <li>
                    <form action="{{ route('search.by.word') }}" method="GET">
                        <input type="submit" value="Z" name="searc_word">
                    </form>
                </li>
            </ul>
          </div>
          <div class="emp-wrap"> 
            <div class="org-t O-res">
              <div class="Snum O-title">SL.</div>
              <div class="Org-name O-title">Company Name <span>(No. of Jobs)</span></div>
              <div class="Numojob O-title">No. of Jobs</div>
            </div>
            @foreach ($companies as $key=>$company)
            <div class="org-t O-res O-res-O">
              <div class="Snum">
                {{ $key + 1 }}
              </div>
              <div class="Org-name">
                <a class="sub_window_new_update" id="ViewAllJobs0" href="{{ route('company.job.posts', $company->id) }}">
                  {{ $company->company_name }}
                </a>
              </div>
              <div class="Numojob">
                  {{ count($company->jobPost) }}
              </div>
            </div>
            @endforeach
            <p class="pagination px-2">
              {{ $companies->links() }}
            </p>
          </div>
        </div>
        @endisset
      </div>
    </div>

  </div>
</section>




























@endsection
@push('page-script')
@endpush
