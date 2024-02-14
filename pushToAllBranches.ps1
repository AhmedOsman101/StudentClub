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
if ($args -contains '-y') {
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
            git push origin $userBranch
        }
    }
}

Write-Host "Done!"
# Switch to the main branch
git checkout main
