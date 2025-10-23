<?php

namespace app\helpers;

enum TaskFields: string
{
    case ID = "id";
    case Done = "done";
    case Urgency = "urgency";
    case Description = "description";
    case UserId = "user_id";
}
