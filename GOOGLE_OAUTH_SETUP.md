# Configuration Google OAuth pour Culture Béninoise

## Configuration requise

Pour activer l'authentification Google, vous devez :

### 1. Créer un projet Google Cloud Console

1. Allez sur https://console.cloud.google.com/
2. Créez un nouveau projet ou sélectionnez un projet existant
3. Activez l'API Google+ API
4. Créez des identifiants OAuth 2.0

### 2. Configurer les identifiants

Dans votre fichier `.env`, ajoutez :

```env
GOOGLE_CLIENT_ID=votre_client_id_google
GOOGLE_CLIENT_SECRET=votre_client_secret_google
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

### 3. Variables d'environnement détaillées

- `GOOGLE_CLIENT_ID` : L'ID client fourni par Google
- `GOOGLE_CLIENT_SECRET` : Le secret client fourni par Google
- `GOOGLE_REDIRECT_URI` : L'URL de redirection après authentification

### 4. Configuration dans Google Console

- **URI d'autorisation** : `http://localhost:8000/auth/google`
- **URI de redirection** : `http://localhost:8000/auth/google/callback`
- **Scopes** : `openid`, `profile`, `email`

## Test de l'authentification

Une fois configuré :
1. Allez sur `/login`
2. Cliquez sur "Se connecter avec Google"
3. Vous serez redirigé vers Google pour l'authentification
4. Après authentification, vous serez redirigé vers le dashboard

## Note

Si vous n'avez pas de compte Google Cloud, l'application fonctionne parfaitement avec l'authentification Laravel Breeze classique (email/mot de passe).

