<?
//app/Http/Controllers/RoleController.php 
namespace App\Http\Controllers; 
use App\Models\User; 
use Illuminate\Http\Request; 
class RoleController extends Controller { 
    public function updateRoles() { // Vérifier si  l'utilisateur avec cet email exist
     $admin=User::where('email', 'presira857@gmail.com' )->first();

if ($admin) {
// Assigner le rôle 'admin' à cet utilisateur
$admin->update(['role' => '2']);
} else {
return response()->json(['message' => 'Admin user not found'], 404);
}

// Assigner le rôle 'user' à tous les autres utilisateurs sans rôle
User::whereNull('role')->update(['role' => '3']);

return response()->json(['message' => 'Roles updated successfully']);
}
}