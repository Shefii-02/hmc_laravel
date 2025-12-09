<h3>New Job Application Received</h3>

<p><strong>Job Applied:</strong> {{ $career->title }}</p>

<p><strong>Name:</strong> {{ $application->name }}</p>
<p><strong>Email:</strong> {{ $application->email }}</p>
<p><strong>Phone:</strong> {{ $application->phone }}</p>

@if($application->message)
<p><strong>Message:</strong><br> {{ $application->message }}</p>
@endif

<p>CV is attached with this email.</p>
