<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationParentCategory; 
use App\Models\ApplicationChildCategory;

class ApplicationFlowController extends Controller
{
    public function index()
    {
        $parentCategories = ApplicationParentCategory::with('children')->get();
        return view('application_flows.index', compact('parentCategories'));
    }

    public function storeParent(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);
        ApplicationParentCategory::create($request->only('name'));
        return redirect()->route('application-flows.index')->with('success', 'Application parent category added successfully.');
    }

    public function storeChild(Request $request)
    {
        $request->validate(['parent_id' => 'required|exists:application_parent_categories,id', 'name' => 'required|string|max:255']);
        ApplicationChildCategory::create($request->only('parent_id', 'name'));
        return redirect()->route('application-flows.index')->with('success', 'Application child category added successfully.');
    }

    public function updateParent(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $parentCategory = ApplicationParentCategory::findOrFail($id);
        $parentCategory->update($request->only('name'));
        return redirect()->route('application-flows.index')->with('success', 'Application parent category updated successfully.');
    }

    public function updateChild(Request $request, $id)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $childCategory = ApplicationChildCategory::findOrFail($id);
        $childCategory->update($request->only('name'));
        return redirect()->route('application-flows.index')->with('success', 'Application child category updated successfully.');
    }

    public function destroyChild($id)
    {
        $childCategory = ApplicationChildCategory::findOrFail($id);
        $childCategory->delete();
        return redirect()->route('application-flows.index')->with('success', 'Application child category deleted successfully.');
    }
}
