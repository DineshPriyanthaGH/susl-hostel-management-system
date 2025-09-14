#!/bin/bash
# Health check for SUSL Hostel Management System

# Check if Apache is running
if ! pgrep apache2 > /dev/null; then
    echo "Apache is not running"
    exit 1
fi

# Check if Laravel responds
if ! curl -f http://localhost/health 2>/dev/null; then
    # Try root path
    if ! curl -f http://localhost/ 2>/dev/null; then
        echo "Laravel application not responding"
        exit 1
    fi
fi

echo "Application is healthy"
exit 0