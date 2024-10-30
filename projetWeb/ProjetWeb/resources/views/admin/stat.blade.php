@extends('layout.dash')

@section('content')

<!-- ========================= Main ==================== -->
<div class="main">
    <div class="topbar">
        <div class="toggle">
            <ion-icon name="menu-outline"></ion-icon>
        </div>
    </div>
    <h1>WELCOME TO THE STATISTICS</h1>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    </head>

    <body>

        <div class="container">


            <div class="row">
                <div class="title">
                    <h3>Distribution by Business Sector for each company </h3>
                    <canvas id="secteurChart"></canvas>
                </div>
            </div>

            <div class="row">
                <div class="title">
                    <h3>Distribution by Location for each company </h3>
                    <canvas id="localiteChart"></canvas>
                </div>
            </div>

            <div class="row">
                <div class="title">
                    <h3>The Most Picked Companies </h3>
                    <canvas id="pickedChart"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="title">
                <h3>Distribution by location for Each Offer</h3>
                <canvas id="internL"></canvas>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="title">
                    <h3>Distribution by Skills for Each Offer</h3>
                    <canvas id="internC"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="title">
                <h3>Distribution by promotion for Each Offer</h3>
                <canvas id="internP"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="title">
                <h3>Distribution by duration for Each Offer</h3>
                <canvas id="internD"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="title">
                <h3>Distribution by the number of wishlist for Each Offer</h3>
                <canvas id="internW"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="title">
                <h3>stats of the Familly Name of each student</h3>
                <canvas id="studentN"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="title">
                <h3>stats of the Name of each student</h3>
                <canvas id="studentP"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="title">
                <h3>stats of the centre of each student</h3>
                <canvas id="studentC"></canvas>
            </div>
        </div>
        <div class="row">
            <div class="title">
                <h3>stats of the promotion of each student</h3>
                <canvas id="studentPr"></canvas>
            </div>
        </div>




    </div>
    

        <style>
            .title {
                display: inline-block;
                width: 100%;
            }

            #secteurChart,
            #localiteChart,
            #pickedChart,
            #internC, 
            #internL,
            #internP,
            #internD,
            #internW,
            #studentN,
            #studentP,
            #studentC,
            #studentPr {
                 min-width: 1000px; /* Adjust the max-width as needed */
                 min-height: 600px;
                margin: 20px auto;
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                text-align: center;
                margin-bottom: 100px;
                color: #333;
                text-decoration: underline;
            }

            h3 {
                text-align: center;
                margin-top: 30px;
                margin-bottom: 10px;
                color: #555;
            }
        </style>

    <script>
        var secteurData = {!! json_encode($secteurData) !!};

        var secteurCtx = document.getElementById('secteurChart').getContext('2d');

        var secteurChart = new Chart(secteurCtx, {
            type: 'bar',
            data: {
                labels: secteurData.map(item => item.sector),
                datasets: [{
                    label: '1 sector',
                    data: secteurData.map(item => item.total),
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.6)',   // Red
                    'rgba(0, 255, 0, 0.6)',   // Green
                    'rgba(0, 0, 255, 0.6)',   // Blue
                    'rgba(128, 0, 128, 0.6)',   
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });

        var localiteCtx = {!! json_encode($localiteCtx) !!};

        var localitetx = document.getElementById('localiteChart').getContext('2d');

        var localiteChart = new Chart(localitetx, {
            type: 'bar',
            data: {
                labels: localiteCtx.map(item => item.city),
                datasets: [{
                    label: '1 location',
                    data: localiteCtx.map(item => item.total),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });

        var bestCtx = {!! json_encode($bestCtx) !!};
        var best = document.getElementById('pickedChart').getContext('2d');

        var bestChart = new Chart(best, {
            type: 'bar',
            data: {
                labels: bestCtx.map(item => item.name),
                datasets: [{
                    label: '1 application',
                    data: bestCtx.map(item => item.num_students_applied),
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.6)',   // Red
                    'rgba(0, 255, 0, 0.6)',   // Green
                    'rgba(0, 0, 255, 0.6)',   // Blue
                    'rgba(128, 0, 128, 0.6)', 
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });

        var skillCtx = {!! json_encode($skillCtx) !!};
        var skillC = document.getElementById('internC').getContext('2d');

        var bestChart = new Chart(skillC, {
            type: 'bar',
            data: {
                labels: skillCtx.map(item => item.competence_name),
                datasets: [{
                    label: '1 offer',
                    data: skillCtx.map(item => item.num_internships),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });


        var skillLCtx = {!! json_encode($skillLCtx) !!};
        var skillL = document.getElementById('internL').getContext('2d');

        var bestChart = new Chart(skillL, {
            type: 'bar',
            data: {
                labels: skillLCtx.map(item => item.location),
                datasets: [{
                    label: '1 location',
                    data: skillLCtx.map(item => item.total),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });


        var skillPCtx = {!! json_encode($skillPCtx) !!};
        var skillP = document.getElementById('internP').getContext('2d');

        var bestChart = new Chart(skillP, {
            type: 'bar',
            data: {
                labels: skillPCtx.map(item => item.promotion_type),
                datasets: [{
                    label: '1 promotion',
                    data: skillPCtx.map(item => item.total),
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.6)',   // Red
                    'rgba(0, 255, 0, 0.6)',   // Green
                    'rgba(0, 0, 255, 0.6)',   // Blue
                    'rgba(128, 0, 128, 0.6)', 
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });

        var skillDCtx = {!! json_encode($skillDCtx) !!};
        var skillD = document.getElementById('internD').getContext('2d');

        var bestChart = new Chart(skillD, {
            type: 'bar',
            data: {
                labels: skillDCtx.map(item => item.duration),
                datasets: [{
                    label: '1 offer',
                    data: skillDCtx.map(item => item.total),
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.6)',   // Red
                    'rgba(0, 255, 0, 0.6)',   // Green
                    'rgba(0, 0, 255, 0.6)',   // Blue
                    'rgba(128, 0, 128, 0.6)', 
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });



        var skillWCtx = {!! json_encode($skillWCtx) !!};
        var skillW = document.getElementById('internW').getContext('2d');

        var bestChart = new Chart(skillW, {
            type: 'bar',
            data: {
                labels: skillWCtx.map(item => item.internship_name),
                datasets: [{
                    label: '1 wishlist',
                    data: skillWCtx.map(item => item.num_wishlists),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });

        
        var studentNCtx = {!! json_encode($studentNCtx) !!};
        var studN = document.getElementById('studentN').getContext('2d');

        var bestChart = new Chart(studN, {
            type: 'bar',
            data: {
                labels: studentNCtx.map(item => item.nom),
                datasets: [{
                    label: '1 student',
                    data: studentNCtx.map(item => item.user_count),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });
        var studentPCtx = {!! json_encode($studentPCtx) !!};
        var studP = document.getElementById('studentP').getContext('2d');
        var bestChart = new Chart(studP, {
            type: 'bar',
            data: {
                labels: studentPCtx.map(item => item.prenom),
                datasets: [{
                    label: '1 student',
                    data: studentPCtx.map(item => item.user_count),
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.6)',   // Red
                    'rgba(0, 255, 0, 0.6)',   // Green
                    'rgba(0, 0, 255, 0.6)',   // Blue
                    'rgba(128, 0, 128, 0.6)', 
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });


        var studentCCtx = {!! json_encode($studentCCtx) !!};
        var studC = document.getElementById('studentC').getContext('2d');

        var bestChart = new Chart(studC, {
            type: 'bar',
            data: {
                labels: studentCCtx.map(item => item.centre),
                datasets: [{
                    label: '1 student',
                    data: studentCCtx.map(item => item.user_count),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });
        var studentPrCtx = {!! json_encode($studentPrCtx) !!};
        var studPr = document.getElementById('studentPr').getContext('2d');
        var bestChart = new Chart(studPr, {
            type: 'bar',
            data: {
                labels: studentPrCtx.map(item => item.promotion),
                datasets: [{
                    label: '1 student',
                    data: studentPrCtx.map(item => item.user_count),
                    backgroundColor: [
                        'rgba(255, 0, 0, 0.6)',   // Red
                    'rgba(0, 255, 0, 0.6)',   // Green
                    'rgba(0, 0, 255, 0.6)',   // Blue
                    'rgba(128, 0, 128, 0.6)', 
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>

    </body>

    </html>

    @endsection
