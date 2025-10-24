<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Exibir página de projetos (pública)
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    // Exibir formulário de criação de projeto (admin)
    public function create()
    {
        return view('admin.projects.create');
    }

    // Armazenar novo projeto (admin)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $validated['image'] = $path;
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projeto criado com sucesso!');
    }

    // Exibir formulário de edição de projeto (admin)
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // Atualizar projeto (admin)
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Deletar imagem antiga se existir
            if ($project->image && \Storage::disk('public')->exists($project->image)) {
                \Storage::disk('public')->delete($project->image);
            }
            $path = $request->file('image')->store('projects', 'public');
            $validated['image'] = $path;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projeto atualizado com sucesso!');
    }

    // Deletar projeto (admin)
    public function destroy(Project $project)
    {
        if ($project->image && \Storage::disk('public')->exists($project->image)) {
            \Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projeto deletado com sucesso!');
    }
}

