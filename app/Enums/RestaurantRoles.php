<?php

namespace App\Enums;

enum RestaurantRoles: string
{
    case RestaurantManager = 'restaurant_manager';
    case HeadChef = 'head_chef';
    case SousChef = 'sous_chef';
    case Waiter = 'waiter';
    case Host = 'host';
    case Bartender = 'bartender';
    case LineCook = 'line_cook';
    case Dishwasher = 'dishwasher';
    case PrepCook = 'prep_cook';

    public function label(): string
    {
        return match ($this) {
            self::RestaurantManager => 'Restaurant Manager',
            self::HeadChef => 'Head Chef (Executive Chef)',
            self::SousChef => 'Sous Chef',
            self::Waiter => 'Waiter/Waitress (Server)',
            self::Host => 'Host/Hostess',
            self::Bartender => 'Bartender',
            self::LineCook => 'Line Cook',
            self::Dishwasher => 'Dishwasher',
            self::PrepCook => 'Prep Cook',
        };
    }

    public function description(): string
    {
        return match ($this) {
            self::RestaurantManager => 'Oversees restaurant operations',
            self::HeadChef => 'Leads the kitchen team',
            self::SousChef => 'Assists the head chef',
            self::Waiter => 'Serves customers',
            self::Host => 'Welcomes guests',
            self::Bartender => 'Prepares drinks',
            self::LineCook => 'Prepares specific food items',
            self::Dishwasher => 'Cleans dishes',
            self::PrepCook => 'Prepares ingredients',
        };
    }
}
