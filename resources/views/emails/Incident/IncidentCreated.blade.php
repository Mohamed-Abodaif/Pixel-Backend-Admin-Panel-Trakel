<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incident Announcement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .header h1 {
            margin: 0;
            font-size: 20px;
            color: #007bff;
        }
        .content {
            padding: 20px;
        }
        .content p {
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Incident Initial Announcement</h1>
    </div>
    <div class="content">
        <p>Dear {{$userName->name}},</p>
        <p>We would like to inform you about a new incident:</p>
        <p><strong>Incident Title:</strong> {{$incident->title}}</p>
        <p><strong>Incident Date:</strong> {{$incident->date}}</p>
        <p><strong>Location:</strong> {{$incident->branch->name." / ".$incident->area->name." / ".$incident->subArea->name." / ".$incident->location_details ?? ''}}</p>
        <p><strong>Summary:</strong>  {!! $incident->details ?? '' !!}</p>
        <p>You can find the complete initial announcement attached. Please take the necessary actions and stay safe.</p>
    </div>
    @if(isset($incident->attachments))
        @foreach($incident->attachments as $attachment)
            <p>
                <a href="{{  route("test-download" , $attachment->id) }}" target="_blank">Download Attachment</a>
            </p>
        @endforeach
    @endif
    <div class="footer">
        <p>Best regards,</p>
        <p><strong>{{$companyName}} HSE Team</strong></p>
        <p>Powered by <a href="https://pixel-softwares.com">PIXEL SOFTWARES</a></p>
    </div>
</div>
</body>
</html>
