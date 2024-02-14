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

$hasBranches = Read-Host -Prompt "Do you have branches? (y/n)"

if ($hasBranches -eq "y" -or $hasBranches -eq "Y") {
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
elseif ($hasBranches -eq "n" -or $hasBranches -eq "N") {
    Write-Host "No branches found"
}
else {
    Write-Host "Invalid input"
}
# Switch to the main branch
git checkout main
