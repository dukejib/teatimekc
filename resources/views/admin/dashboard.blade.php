@extends('layouts.app')

@section('content')

<div class="container mt-2 justify-content-center">

    <div class="row">
        <!-- Include Menu -->
        <div class="col-lg-3">
            @include('includes.adminmenu')
        </div>
        <!-- Add Content here -->
        <div class="col-lg-9">
            @include('includes.errors')
            
            <div class="row">
                <div class="col-lg-4">

                    <div class="analytics">
                        <div class="row">
                            <div class="col">
                                <i class="fas fa-tags fa-5x text-gray analytics-icon"></i>
                            </div>
                            <div class="col analytics-text">
                                <p>Tags</p>
                                {{ $tagscount }}
                            </div>
                        </div>
                    </div>
                
                </div>

                <div class="col-lg-4">

                    <div class="analytics">
                        <div class="row">
                            <div class="col">
                                <i class="fas fa-chalkboard fa-5x text-gray analytics-icon"></i>
                            </div>
                            <div class="col analytics-text">
                                <p>Categories</p>
                                {{ $catcount }}
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="col-lg-4">

                    <div class="analytics">
                        <div class="row">
                            <div class="col">
                                <i class="fas fa-file fa-5x text-gray analytics-icon"></i>
                            </div>
                            <div class="col analytics-text">
                                <p>Posts</p>
                                {{ $postscount }}
                            </div>
                        </div>
                    </div>
                
                </div>
            
                <div class="col-lg-4">

                    <div class="analytics">
                        <div class="row">
                            <div class="col">
                                <i class="fas fa-file fa-5x text-gray analytics-icon"></i>
                            </div>
                            <div class="col analytics-text">
                                <p>Pending</p>
                                {{ $pendingcount }}
                            </div>
                        </div>
                    </div>
                
                </div>
            
                <div class="col-lg-4">

                    <div class="analytics">
                        <div class="row">
                            <div class="col">
                                <i class="fas fa-users fa-5x text-gray analytics-icon"></i>
                            </div>
                            <div class="col analytics-text">
                                <p>Members</p>
                                {{ $memberscount }}
                            </div>
                        </div>
                    </div>
                
                </div>

                <div class="col-lg-4">

                    <div class="analytics">
                        <div class="row">
                            <div class="col">
                                <i class="fas fa-search-plus fa-5x text-gray analytics-icon"></i>
                            </div>
                            <div class="col analytics-text">
                                <p>Views</p>
                                {{ $viewscount }}
                            </div>
                        </div>
                    </div>
                
                </div>
        
                

            </div>

            {{-- Vies/User Visits Chart --}}
            <div class="row">
                
                <div class="col-lg-6">
                    <canvas id="dailyviews" width="400" height="400" class="bg-secondary"></canvas>
                </div>

                <div class="col-lg-6">
                    <canvas id="uniqueips" width="400" height="400" class="bg-secondary"></canvas>
                </div>

                {{-- {{ $dailyviews[0]->counter }} --}}
            </div>

            {{-- Top 10 Posts --}}
            <div class="row">
                <div class="col-lg-6">
                    <h4>Top 10 Posts</h4>
                    <table class="table table-dark table-striped table-sm">
                        <thead>
                            <th>Post Title</th>
                            <th>Views</th>
                        </thead>
                        
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td class="urdu text-truncate">{{ $post->title }}</td>
                                    <td>{{ $post->views }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            
        </div>

    </div>

</div>
   
@endsection

@section('scripts')
    
<script>
    var ctx = document.getElementById("dailyviews").getContext('2d');
    var ctx2 = document.getElementById("uniqueips").getContext('2d');

    //Chart Defaults
    Chart.defaults.global.defaultFontColor = 'white';
    Chart.defaults.global.defaultFontFamily = 'Comfortaa';
    Chart.defaults.global.responsive = true;

    var uniqueips = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                
                @foreach ($uniqueviews as $v)
                    "{{ $v->date}}",
                @endforeach
            ],
            datasets: [{
                label: 'Unique Users',
                data: [
                    @foreach ($uniqueviews as $v)
                        {{ $v->ip }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(26,188,156 ,0.5)',
                    'rgba(46,204,113 ,0.5)',
                    'rgba(52,152,219 ,0.5)',
                    'rgba(155,89,182 ,0.5)',
                    'rgba(241,196,15 ,0.5)',
                    'rgba(230,126,34 ,0.5)',
                    'rgba(231,76,60 ,0.5)',
                ],
                borderColor: [
                    'rgba(26,188,156 ,1)',
                    'rgba(46,204,113 ,1)',
                    'rgba(52,152,219 ,1)',
                    'rgba(155,89,182 ,1)',
                    'rgba(241,196,15 ,1)',
                    'rgba(230,126,34 ,1)',
                    'rgba(231,76,60 ,1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
            
        }
    });

    var dailyviews = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: [
                //Ensure to enclose date in dbl quote, otherwise array will + it
                @foreach ($dailyviews as $v)
                    "{{ $v->the_date}}",
                @endforeach
            ],
            datasets: [{
                label:'Some text',
                data: [
                    @foreach ($dailyviews as $v)
                        {{ $v->counter}},
                    @endforeach
                ],
                borderColor: "#3e95cd",
                fill: false,
                borderWidth: 5
            }]
        },
        options: {
            title: {
    //   display: true,
    //   text: 'World population per region (in millions)'
    }
            
        }
    });
    </script>

@endsection