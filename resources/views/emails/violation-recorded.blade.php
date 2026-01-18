<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #800000;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
        }

        .info-row {
            margin: 10px 0;
            padding: 10px;
            background-color: white;
            border-left: 3px solid #800000;
        }

        .label {
            font-weight: bold;
            color: #800000;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #800000;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Violation Record Notice</h2>
        </div>

        <div class="content">
            <p>Dear {{ $user->first_name }} {{ $user->last_name }},</p>

            <p>This is to inform you that a violation has been recorded against your account.</p>

            <div class="info-row">
                <span class="label">Case ID:</span> {{ $record->formatCaseId() }}
            </div>

            <div class="info-row">
                <span class="label">Student ID:</span> {{ $user->school_id }}
            </div>

            <div class="info-row">
                <span class="label">Violation:</span>
                {{ $record->violationSanction->violation->violation_name }}
            </div>

            <div class="info-row">
                <span class="label">Offense Number:</span>
                {{ $record->violationSanction->no_of_offense }}
            </div>

            <div class="info-row">
                <span class="label">Sanction:</span>
                {{ $record->violationSanction->sanction->sanction_name }}
            </div>

            <div class="info-row">
                <span class="label">Date Recorded:</span>
                {{ $record->created_at->format('F d, Y') }}
            </div>

            <div class="info-row">
                <span class="label">Status:</span> {{ $record->status->status_name }}
            </div>

            <p style="margin-top: 20px;">
                Please visit the Discipline Office if you have any questions or concerns regarding this violation.
            </p>
        </div>

        <div class="footer">
            <p>This is an automated message from the School Violation System.</p>
            <p>Please do not reply to this email.</p>
        </div>
    </div>
</body>

</html>