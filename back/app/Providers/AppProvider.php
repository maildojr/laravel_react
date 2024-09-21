<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Movies
use App\Models\Movies;
use App\core\infra\laravel\resources\cls_resource_movies;
use App\core\movies\use_case\list\cls_use_case_list_movies;
use App\core\movies\use_case\find\cls_use_case_find_movie;
use App\core\movies\use_case\new\cls_use_case_new_movie;
use App\core\movies\use_case\edit\cls_use_case_edit_movie;
use App\core\movies\use_case\remove\cls_use_case_remove_movie;

// Actors
use App\Models\Actors;
use App\core\infra\laravel\resources\cls_resource_actors;
use App\core\actors\use_case\list\cls_use_case_list_actors;

class AppProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // **** ACTORS ****
        //Registro do Use Case Listar Atores
        $this->app->bind(cls_use_case_list_actors::class, function ($app) {
            return new cls_use_case_list_actors(
                new cls_resource_actors(new Actors())
            );
        });
        // **** MOVIES *****
        //Registo do Use Case Listar Filmes
        $this->app->bind(cls_use_case_list_movies::class, function ($app) {
            return new cls_use_case_list_movies(
                new cls_resource_movies(new Movies())
            );
        });
        //Registo do Use Case Buscar Filme
        $this->app->bind(cls_use_case_find_movie::class, function ($app) {
            return new cls_use_case_find_movie(
                new cls_resource_movies(new Movies())
            );
        });
        //Registo do Use Case Criar Filme
        $this->app->bind(cls_use_case_new_movie::class, function ($app) {
            return new cls_use_case_new_movie(
                new cls_resource_movies(new Movies())
            );
        });
        //Registo do Use Case Editar Filme
        $this->app->bind(cls_use_case_edit_movie::class, function ($app) {
            return new cls_use_case_edit_movie(
                new cls_resource_movies(new Movies())
            );
        });
        //Registo do Use Case Remover Filme
        $this->app->bind(cls_use_case_remove_movie::class, function ($app) {
            return new cls_use_case_remove_movie(
                new cls_resource_movies(new Movies())
            );
        });

    }


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
