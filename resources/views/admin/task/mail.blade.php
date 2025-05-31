<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $subjectLine }}</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif; color: #333;">
    <div style="max-width: 800px; margin: 40px auto; background: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);">
        <div style="background-color: #696cff; color: #ffffff; text-align: center; padding: 20px; font-size: 24px; font-weight: bold;">
            New Task Assigned: {{ $task->title }}
        </div>
        <div style="padding: 20px 30px;">
            <p><strong style="color: #555;">Task Title:</strong> {{ $task->title }}</p>
            <hr>
            <p><strong style="color: #555;">Description:</strong><br> {!! $task->description !!}</p>
            <hr>
            <p><strong style="color: #555;">Start Date:</strong> {{ \Carbon\Carbon::parse($task->start_date)->format('F j, Y') }}</p>
            <hr>
            <p><strong style="color: #555;">Due Date:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('F j, Y') }}</p>
            <hr>
            <p><strong style="color: #555;">Project:</strong> {{ $task->project->name ?? 'N/A' }}</p>
            <hr>
            <p><strong style="color: #555;">Assigned By:</strong> {{ $task->creator->name ?? 'N/A' }}</p>
            <div style="text-align: center;">
                <a href="{{ route('task.index') }}" style="display: inline-block; background-color: #28a745; color: #fff; text-decoration: none; padding: 12px 24px; margin: 30px auto; border-radius: 6px; font-weight: bold; font-size: 16px;">View Task</a>
            </div>
        </div>
        <div style="background-color: #f9f9f9; text-align: center; padding: 20px; font-size: 13px; color: #888;">
            <div style="margin-bottom: 10px;">
                <a href="https://facebook.com/yourcompany" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" style="width: 24px; margin: 0 8px; vertical-align: middle;">
                </a>
                <a href="https://twitter.com/yourcompany" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" style="width: 24px; margin: 0 8px; vertical-align: middle;">
                </a>
                <a href="https://linkedin.com/company/yourcompany" target="_blank">
                    <img src="https://cdn-icons-png.flaticon.com/512/733/733561.png" alt="LinkedIn" style="width: 24px; margin: 0 8px; vertical-align: middle;">
                </a>
            </div>
            <div style="margin-top: 10px; font-weight: bold; color: #444;">© 2025 YourCompany Inc.</div>
            <hr style="margin: 10px auto; width: 80%;">
            This task was assigned via Task Manager System. Please log in to your account to view or take action.
        </div>
    </div>
</body>
</html>
