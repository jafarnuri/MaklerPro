@extends('admin_layout.master')

@section('contect')
<div class="container">
    <h2 class="mb-4">Maklerlərin Aylıq Qazancı</h2>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ay</th>
                    <th>İl</th>
                    <th>Makler</th>
                    <th>Toplam Qazancı (AZN)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($maklerler as $makler)
                    @foreach($makler['monthly_income'] as $month => $total_income)
                        <tr>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m', $month)->format('F') }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m', $month)->format('Y') }}</td>
                            <td>{{ $makler['name'] }}</td>
                            <td>{{ number_format($total_income, 2) }} AZN</td>
                        </tr>
                    @endforeach
                @endforeach

                @if($maklerler->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">Məlumat tapılmadı</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
