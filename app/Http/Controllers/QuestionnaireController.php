<?php

namespace App\Http\Controllers;

use App\Models\{
    Questionnaire,
    Tag,
    Department
};
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionnaireRequest;
use App\Http\Requests\UpdateQuestionnaireRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $questionnaires = Questionnaire::select([
            'id',
            'name',
            'description',
            'job_title',
            'photo'
        ])->orderBy('id', 'desc')->get();

        return view('questionnaires.index', compact('questionnaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $departments = Department::select(['id', 'name'])->get();
        $tags = Tag::select(['id', 'name'])->get();

        return view('questionnaires.create', compact('departments', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionnaireRequest $request): RedirectResponse
    {
        $questionnaire = Questionnaire::create($request->post());
        $questionnaire->tags()->attach($request->input('tags'));

        return redirect()->route('questionnaires.index')->with('success','Новая анкета добавлена успешно');
    }

    /**
     * Display the specified resource.
     */
    public function show(Questionnaire $questionnaire): View
    {
        return view('questionnaires.show', compact('questionnaire'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questionnaire $questionnaire): View
    {
        $departments = Department::select(['id', 'name'])->get();
        $tags = Tag::select(['id', 'name'])->get();

        return view('questionnaires.edit', compact('departments', 'tags', 'questionnaire'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionnaireRequest $request, Questionnaire $questionnaire): RedirectResponse
    {
        $questionnaire->fill($request->post())->save();
        $questionnaire->tags()->sync($request->input('tags'));

        return redirect()->route('questionnaires.index')->with('success','Анкета отредактирована успешно');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Questionnaire $questionnaire): RedirectResponse
    {
        $questionnaire->delete();

        return redirect()->route('questionnaires.index')->with('success','Анкета удалена успешно');
    }
}
