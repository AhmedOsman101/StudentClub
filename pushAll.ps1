# Switch to the main branch
git checkout main

# commit & sync all changes before execution

# stage all changes
git add .

# commit all changes to git
git commit -m "commit changes via PS script"

# sync/push all changes to github
git push -u origin main

# Pull changes from the remote main branch
git pull origin main

# Check if there are any branches
if ($args -contains '-b') {
    # Array of user branches
    $userBranches = git branch | ForEach-Object { $_.TrimStart("* ").Trim() }
    
    # Loop over each user branch
    foreach ($userBranch in $userBranches) {
        if ($userBranch -ne 'main') {
            # Switch to the user branch
            git checkout $userBranch

            # Merge changes from the main branch into the user branch (if needed)
            git merge main

            # Push the changes to GitHub
            try {
                git push origin $userBranch
                Write-Host "Changes pushed to $userBranch on GitHub."
            }
            catch {
                Write-Host "Error pushing changes to $userBranch on GitHub: $_"
            }
        }
    }
}

# Switch to the main branch
git checkout main

Write-Host "Done!" -ForegroundColor DarkGreen
