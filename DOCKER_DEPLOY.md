# Déploiement Docker - Laravel

## Configuration Rapide

### Prérequis
- Docker & Docker Compose installés

### Déploiement Local (pour tester avant production)

```bash
# Cloner le projet
git clone <repo-url>
cd Laravel

# Démarrer les conteneurs
docker-compose up -d

# L'application est accessible sur http://localhost:80
```

### Déploiement sur Dokploy

1. **Connectez-vous à Dokploy**
2. **Créer une nouvelle application:**
   - Repository: Git (votre repo)
   - Build: Docker
   - Dockerfile: `./Dockerfile`
   - Port: `80`
   - Volumes:
     - `./storage` → `/app/storage`
     - `./bootstrap/cache` → `/app/bootstrap/cache`

3. **Variables d'environnement (.env)**
   ```
   APP_NAME=Laravel
   APP_ENV=production
   APP_DEBUG=false
   APP_KEY=base64:Bv6fs37bvP6DzNJUwC70bpvXaxX91ApkVEYbAxlg2rI=
   APP_URL=http://votre-domaine.com
   DB_CONNECTION=mysql
   DB_HOST=db
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=laravel
   DB_PASSWORD=votre_mot_de_passe
   ```

4. **Déployer**
   - Le Dockerfile gère automatiquement:
     - Installation de PHP 8.2 + Nginx + Composer
     - Installation des dépendances PHP
     - Migrations de base de données
     - Configuration des caches

## Architecture

- **Single Container Deployment**: PHP + Nginx + Supervisor (tout dans un conteneur)
- **Database**: MySQL en conteneur séparé
- **Volumes**: Stockage persistent pour `storage/` et `bootstrap/cache/`
- **Port**: Port 80 exposé directement

## Logs & Débogage

Les logs sont disponibles dans les logs Docker:

```bash
docker-compose logs -f app
docker-compose logs -f db
```

## Rebuild après modifications du code

```bash
docker-compose down
docker-compose up -d --build
```
