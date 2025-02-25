@extends('admin_layout.master')

@section('contect')

<div class="content-wrapper">

  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Xoş gəlmisiz</h3>
          <h6 class="font-weight-normal mb-0">Azərbaycanın ən öndə gedən makler şirkəti </h6>
        </div>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class=" grid-margin transparent">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Ümumi abyektlərin sayı</p>
                  <p class="fs-30 mb-2"> {{ $all_shop }}</p>

                </div>
              </div>
            </div>
            <div class="mb-4 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">Satılmış abyektlərin sayı</p>
                  <p class="fs-30 mb-2">{{ $sale_shop }}</p>

                </div>
              </div>
            </div>
            <div class="mb-4 stretch-card transparent">
              <div class="card bg-success">
                <div class="card-body">
                  <p class="mb-4">İcarələnmiş abyektlərin sayı</p>
                  <p class="fs-30 mb-2">{{ $rent_shop }}</p>

                </div>
              </div>
            </div>
            @if(auth()->user()->role === 'admin')
            <div class="mb-4 stretch-card transparent">
              <div class="card bg-success">
                <div class="card-body">
                  <p class="mb-4">Şirkətin Qazancı</p>
                  <p class="fs-30 mb-2">{{ $sirketinqazanci }} AZN</p>
                </div>
              </div>
            </div>
            @endif

          </div>
          <div class="col-md-6">
            <div class="mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Ümumi mənzillərin sayı</p>
                  <p class="fs-30 mb-2">{{ $all_home }}</p>

                </div>
              </div>
            </div>
            <div class="mb-4 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">Satılmış mənzillərin sayı</p>
                  <p class="fs-30 mb-2">{{ $sale_home }}</p>

                </div>
              </div>
            </div>
            <div class="mb-4 stretch-card transparent">
              <div class="card bg-success">
                <div class="card-body">
                  <p class="mb-4">İcarələnmiş mənzillərin sayı</p>
                  <p class="fs-30 mb-2">{{ $rent_home }}</p>

                </div>
              </div>
            </div>
            @if(auth()->user()->role === 'admin')
            <div class="mb-4 stretch-card transparent">
              <div class="card bg-success">
                <div class="card-body">
                  <p class="mb-4">Maklerlerin Qazanci</p>

                  <a href="{{ route('admin.makler_qazanci') }}" class="btn btn-sm text-dark fw-bold" style="background: none; border: none; padding: 0; font-size: 22px;">
                    {{ $maklerlerinqazanci }} 
                  </a>AZN



                </div>
              </div>
            </div>
            @endif
          </div>
        </div>


      </div>

    </div>

    @if(auth()->user()->role === 'admin')
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Aylıq Satış və İcarə Statistikası</h4>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Ay</th>
                  <th>İl</th>
                  <th>Mənzil Satış (AZN)</th>
                  <th>Mənzil İcarə (AZN)</th>
                  <th>Obyekt Satış (AZN)</th>
                  <th>Obyekt İcarə (AZN)</th>
                </tr>
              </thead>
              <tbody>
                @foreach($monthlyStats_home as $homeStat)
                @php
                // Eyni ay və ildə olan shop məlumatını tapırıq
                $shopStat = $monthlyStats_obyekt->where('month', $homeStat->month)
                ->where('year', $homeStat->year)
                ->first();
                @endphp
                <tr>
                  <td>{{ \Carbon\Carbon::createFromDate($homeStat->year, $homeStat->month, 1)->format('F') }}</td>
                  <td>{{ $homeStat->year }}</td>
                  <td>{{ number_format($homeStat->total_sales_income, 2) }} AZN</td>
                  <td>{{ number_format($homeStat->total_rentals_income, 2) }} AZN</td>
                  <td>{{ number_format($shopStat->total_sales_income ?? 0, 2) }} AZN</td>
                  <td>{{ number_format($shopStat->total_rentals_income ?? 0, 2) }} AZN</td>
                </tr>
                @endforeach

                @php
                $monthlyHomeStatsArray = $monthlyStats_home->map(function ($item) {
                return [
                'month' => $item->month,
                'year' => $item->year,
                ];
                })->toArray();
                @endphp

                @foreach($monthlyStats_obyekt as $shopStat)
                @php
                $existsInHome = collect($monthlyHomeStatsArray)
                ->where('month', $shopStat->month)
                ->where('year', $shopStat->year)
                ->first();
                @endphp

                @if(!$existsInHome)
                <tr>
                  <td>{{ \Carbon\Carbon::createFromDate($shopStat->year, $shopStat->month, 1)->format('F') }}</td>
                  <td>{{ $shopStat->year }}</td>
                  <td>0.00</td>
                  <td>0.00</td>
                  <td>{{ number_format($shopStat->total_sales, 2) }}</td>
                  <td>{{ number_format($shopStat->total_rentals, 2) }}</td>
                </tr>
                @endif
                @endforeach



              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @endif


  </div>


</div>
<!-- content-wrapper ends -->
@endsection