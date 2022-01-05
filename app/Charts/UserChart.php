<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\User;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Support\Facades\DB;



class UserChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public ?string $routeName = 'user_chart';

    public ?array $middlewares = ['auth','admin'];

    public function handler(Request $request): Chartisan
    {
        $etudiants=count(User::get()->where('role','etudiant'));
        $enseignants=count(User::get()->where('role','enseignant'));
        $others=count(DB::table('users')->where('role','admin')->orWhere('role','pre_enseignant')->get());
        
        return Chartisan::build()
            ->labels(['Users'])
            ->dataset('Etudiants', [$etudiants])
            ->dataset('Enseignants', [$enseignants])
            ->dataset('Others', [$others]);
    }
}