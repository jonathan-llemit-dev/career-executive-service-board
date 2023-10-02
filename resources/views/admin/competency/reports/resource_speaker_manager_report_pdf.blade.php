<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Resource Speaker Manager Report</title>

        <style>
            @page {
                margin-top: 75px;
                padding-bottom: 100px;
            }

            header{
                position: fixed;
                left: 0px;
                right: 0px;
                height: 60px;
                margin-top: -60px;
                text-align: center;
            }

            footer {
                position: fixed;
                bottom: -20px;
                right: 20px;
                text-align: right;
                font-size: 10px;
                color: #333;
            }

            table {
                border-collapse: collapse;
                padding-left: 10px;
                padding-right: 10px;
                font-family: Arial;
                width: 100%;
            }
        
            td {
                padding-top: 5px;
                padding-right: 10px;
                padding-left: 10px;
                padding-bottom: 5px;
                font-size: 11px;
                text-align: center;
            }
        
            th {
                color: #284F87;
                font-size: 12px;
                text-transform: uppercase;
                text-align: center;
                background-color: white;
            }
        
            tr:nth-child(even) {
                background-color: #3b83f6b2;
            }
        
            .container {
                text-align: center;
            }
        
            .title {
                margin-top: -20px;
            }
        
            .title_name {
                text-transform: uppercase;
                font-size: 20px;
                color: #284F87;
            }
        
            .title_street {
                margin-top: -20px;
                font-size: 12px;
            }
        
            .link {
                margin-top: -7px;
                font-size: 15px;
            } 

            .report_name {
                text-transform: uppercase;
                font-size: 16px;
                color: #284F87;
                margin-top: 15px;
            }
                
            .page-break {
                page-break-after: always;
                margin-top: 160px;
            }

            .pagenum:before {
                content: counter(page);
            }
        </style>
    </head>

    <body>
        <header>
            <div class="container">
                <div class="logo">
                    <img src="{{ public_path("images/branding.png") }}" alt="" style="width: 100px; height: 100px;">
                </div>
            </div>
            
            <div class="title">
                <p class="title_name">Career Executive Service Board</p>
                <p class="title_street">No. 3 Marcelino St., Isidora Hills, Holy Spirit Drive, Diliman, Quezon City 1127</p>
                <p class="link"><a href="www.cesboard.gov.ph" target="_blank">www.cesboard.gov.ph</a></p>
                <p class="report_name">Resource Speaker Manager Report</p>
            </div> 

            <footer>
                <div class="flex-container">
                    <div class="">Page <span class="pagenum"></span></div>
                </div>
            </footer>
        </header>

        <div>
            <table>
                <thead >
                    <div class="page-break"></div>
                    <tr>
                        <th >
                            
                        </th>

                        <th class="thead">
                            Name
                        </th>

                        <th class="thead">
                            Position
                        </th class="thead">

                        <th class="thead">
                            Department
                        </th class="thead">

                        <th class="thead">
                            Office
                        </th>

                        <th class="thead">
                            Address
                        </th>

                        <th class="thead">
                            Contact No.
                        </th>

                        <th class="thead">
                            Email Address
                        </th>

                        <th class="thead">
                            Expertise
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $rowNumber = 1;
                    @endphp
                
                    @foreach ($resourceSpeaker as $resourceSpeakers)
                        <tr>
                            <td>
                                {{ $rowNumber++ }}
                            </td>

                            <td>
                                {{ $resourceSpeakers->lastname. " " .$resourceSpeakers->firstname. " " .$resourceSpeakers->mi  }}
                            </td>

                            <td>
                                {{ $resourceSpeakers->Position }}
                            </td>

                            <td>
                                {{ $resourceSpeakers->Department }}
                            </td>

                            <td>
                                {{ $resourceSpeakers->Office }}
                            </td>

                            <td>
                                {{ 
                                    $resourceSpeakers->Bldg.', '.
                                    $resourceSpeakers->Street.', '.
                                    $resourceSpeakers->Brgy.', '.
                                    $resourceSpeakers->City
                                }}
                            </td>

                            <td>
                                {{ $resourceSpeakers->contactno }}
                            </td>

                            <td>
                                {{ $resourceSpeakers->emailadd }}
                            </td>

                            <td>
                                {{ $resourceSpeakers->expertise }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>    
        
    </body>
</html>