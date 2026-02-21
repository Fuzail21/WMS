@extends('layouts.app')

@section('title', 'Search by Job Number')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/slidebar.css') }}">
<style>
    .address-badge {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 13px;
        flex-wrap: wrap;
    }
    .address-badge span {
        background-color: #0A1E61;
        color: white;
        padding: 2px 10px;
        border-radius: 20px;
        font-size: 12px;
        white-space: nowrap;
    }
    .address-badge .arrow {
        background: none;
        color: #0A1E61;
        font-weight: bold;
        padding: 0;
        font-size: 14px;
    }
    .search-box {
        max-width: 550px;
    }
    .result-count {
        font-size: 14px;
        color: #555;
        margin-bottom: 10px;
    }
</style>
@endsection

@section('content')

@include('layouts.sidebar')

<div class="slider d-flex align-items-center bg-[#f3f4f6]">
    <h1 class="pt-7" style="font-size:28px;">Hi <strong class="font-bold"> {{ Auth::user()->name }} </strong></h1>
</div>

<div class="main container">

    {{-- Back Button --}}
    @if(!empty($rackId))
    <div style="margin-bottom: 16px; margin-top: 20px;">
        <a href="{{ route('viewRacks', ['id' => $rackId]) }}" style="text-decoration: none;">
            <button type="button" style="background-color: #6c757d; color: white; border: none; border-radius: 7px; padding: 8px 18px; font-size: 14px; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                ← Back to Rack
            </button>
        </a>
    </div>
    @endif

    <h1 class="text-center" style="font-weight: 700; color: #0A1E61; margin-bottom: 10px;">
        Search by Job Number
    </h1>
    <p class="text-center" style="color: #666; font-size: 14px; margin-bottom: 25px;">
        Find all active packets by job number across all locations, racks and boxes
    </p>

    {{-- Search Form --}}
    <div class="search-box mx-auto mb-4">
        <form method="GET" action="{{ route('search-job.results') }}" class="d-flex">
            <input type="hidden" name="rackId" value="{{ $rackId ?? '' }}">
            <input
                type="text"
                name="jobNumber"
                class="form-control"
                placeholder="Enter Job Number..."
                value="{{ $jobNumber ?? '' }}"
                autofocus
                style="border-radius: 8px 0 0 8px; border: 2px solid #0A1E61; padding: 10px 16px; font-size: 15px;"
            >
            <button type="submit" class="btn" style="background-color: #0A1E61; color: white; border-radius: 0 8px 8px 0; padding: 10px 20px; font-size: 15px; border: 2px solid #0A1E61;">
                Search
            </button>
            @if(!empty($jobNumber))
                <a href="{{ route('search-job') }}?rackId={{ $rackId ?? '' }}" class="btn btn-secondary" style="margin-left: 8px; border-radius: 8px; padding: 10px 16px;">
                    Clear
                </a>
            @endif
        </form>
    </div>

    {{-- Results --}}
    @if(isset($results))
        @if($results->isEmpty())
            <div class="alert alert-warning" style="max-width: 550px; margin: 0 auto;">
                No active packets found for job number <strong>"{{ $jobNumber }}"</strong>.
            </div>
        @else
            <p class="result-count text-center">
                Found <strong>{{ $results->count() }}</strong> packet(s) for job number <strong>"{{ $jobNumber }}"</strong>
            </p>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead style="background-color: #0A1E61; color: white;">
                        <tr>
                            <th>Job Number</th>
                            <th>Material Type</th>
                            <th>Material Description</th>
                            <th>No. of Bundles</th>
                            <th>Date In</th>
                            <th>Full Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $row)
                        <tr>
                            <td><strong>{{ $row['jobNumber'] }}</strong></td>
                            <td>{{ $row['materialType'] }}</td>
                            <td>{{ $row['materialDescription'] }}</td>
                            <td>{{ $row['numberOfBundles'] }}</td>
                            <td>{{ $row['dateIn'] }}</td>
                            <td>
                                <div class="address-badge">
                                    <span>{{ $row['locationName'] }}</span>
                                    <span class="arrow">›</span>
                                    <span>{{ $row['rackName'] }}</span>
                                    <span class="arrow">›</span>
                                    <span>{{ $row['boxName'] }}</span>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('viewRacks', ['id' => $row['rackId']]) }}" style="text-decoration: none;">
                                    <button class="btn btn-sm" style="background-color: #0A1E61; color: white; font-size: 12px; border-radius: 5px;">
                                        View Rack
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif

</div>

@endsection
