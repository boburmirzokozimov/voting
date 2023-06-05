<?php

use App\Models\Status;
use Illuminate\Support\Str;

function gravatar_url(string $email)
{
    $email = md5($email);
    return "https://gravatar.com/avatar/{{$email}}?s=60";
}

function getCount(array $status_count, Status $status): string
{
    return $status_count[Str::snake(getStatus($status))];
}

function getStatus(Status $status): string
{
    return $status->name == 'Open' ? 'All' : $status->name;
}

function isSelectedCategory(string $category): string
{
    return request()->query->get('category') == $category ? 'selected' : '';
}

function isSelected(string $filter): string
{
    return request()->query->get('other_filter') == $filter ? 'selected' : '';
}
