@component('mail::message')
# Introduction

#Thank you for your mesasge.


<strong>Name</strong> {{ $data['name'] }}
<strong>Email</strong> {{ $data['email'] }}


<strong>Message</strong>


{{ $data['message'] }}
@endcomponent
