<?php

namespace App\Providers;

use App\Models\Team;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Validator::extend('unique_values', function ($attribute, $value, $parameters, $validator) {
            $otherValues = array_diff($validator->getData(), [$attribute => $value]); // Get all other values except the current attribute
            return count(array_unique($otherValues)) == count($otherValues);
        });

        Validator::replacer('unique_values', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The attribute values must be unique.');
        });
        Validator::extend('unique_team_members', function ($attribute, $value, $parameters, $validator) {
            $teamId = $validator->getData()['team_id'] ?? null; // Get team_id if available
            $team = Team::find($teamId);
            $columns = $team ? $team->getFillable() : array_slice($parameters, 1); // Get column names from parameters or fillable attributes of the team model
            $query = Team::query()->where(function ($query) use ($columns, $value) {
                foreach ($columns as $column) {
                    $query->orWhere($column, $value);
                }
            });
            if ($teamId) {
                $query->where('id', '!=', $teamId); // Exclude current team if editing
            }
            return $query->doesntExist();
        });

        Validator::replacer('unique_team_members', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'that user already in another team');
        });
    }
}
