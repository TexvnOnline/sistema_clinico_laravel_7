<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\User;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(User $user)
    {
        $recipes = $user->my_recipes($user);
        return view('admin.recipes.index', compact('user', 'recipes'));
    }
    public function create(User $user)
    {
        return view('admin.recipes.create', compact('user'));
    }
    public function store(Request $request, User $user, Recipe $recipe)
    {
        $recipe->store($request, $user);
        return redirect()->route('recipes.index', $user)->with('flash', 'registrado');
    }
    public function show(User $user, Recipe $recipe)
    {
        $details = $recipe->recipe_details;
        return view('admin.recipes.show', compact('user', 'recipe', 'details'));
    }
    public function edit(User $user, Recipe $recipe)
    {
        $details = $recipe->recipe_details;
        return view('admin.recipes.edit', compact('user', 'recipe', 'details'));
    }
    public function update(User $user, Request $request, Recipe $recipe)
    {
        $recipe->my_update($user, $request, $recipe);
        return redirect()->route('recipes.index', $user)->with('flash', 'actualizado');
    }
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return back()->with('flash', 'eliminado');
    }
}
